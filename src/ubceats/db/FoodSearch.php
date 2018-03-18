<?php

namespace ubceats\db;


use ubceats\db\Sorts\DistanceSort;
use ubceats\db\Sorts\PriceSort;
use ubceats\db\Sorts\RatingSort;
use ubceats\OpenTimeDecorator;
use ubceats\util\LatLon;

class FoodSearch extends DbQuery {

    static $VENUE_FILTERS = ['mealPlan', 'flexDollars'];

    const RATING_SORT = 0;
    const DISTANCE_SORT = 1;
    const PRICE_SORT = 2;

    private $search;
    private $filters;
    private $sort;
    /** @var  LatLon */
    private $userLoc = null;

    /**
     * FoodSearch constructor.
     * @param $filters
     * @param $sort
     * @param $userLoc
     */
    public function __construct(string $search, array $filters, int $sort){
        $this->search = $search;
        $this->filters = $filters;
        $this->sort = $sort;
    }

    private function groupVenues($arr) : array {
        $venues = [];

        foreach ($arr as $foodItem){
            if(!isset($venues[$foodItem['brandName'] . $foodItem['locationName'] . $foodItem['locationAddress']])){
                $venues[$foodItem['brandName'] . $foodItem['locationName'] . $foodItem['locationAddress']] = [
                    "food_items" => [],
                    "locations" => [],
                    "rating" => 0,
                    "price" => 0,
                    "url" => $foodItem['url'],
                    "phoneNumber" => 'FUCK THAT!',
                    "lat" => $foodItem['latitude'],
                    "lon" => $foodItem['longitude'],
                    "name" => $foodItem['brandName'],
                    "description" => $foodItem['desc'],
                    "opensAt" => ($foodItem['opensAt'] < 1000 &&  $foodItem['opensAt'] != -1 ? "0" . $foodItem['opensAt'] : $foodItem['opensAt']),
                    "closesAt" => ($foodItem['closesAt'] < 1000 && $foodItem['closesAt'] != -1? "0" . $foodItem['closesAt'] : $foodItem['closesAt']),
                    "venue_id" => str_replace(' ', '', $foodItem['brandName'] . $foodItem['locationName'] . $foodItem['locationAddress'])
                ];
            }


            $venues[$foodItem['brandName'] . $foodItem['locationName'] . $foodItem['locationAddress']]["food_items"][] = [
               "price" => $foodItem['price'],
               "item_name" => ucwords(strtolower($foodItem['foodName'])),
               "rating" => $foodItem['rating'],
                "gluten_free" => $foodItem['gluten_free'],
                "vegan" =>  $foodItem['vegan'],
                "vegetarian" => $foodItem['vegetarian']
            ];

        }

        foreach ($venues as &$venue){
            foreach ($venue['food_items'] as &$item){
                $venue['rating'] += $item['rating'];
                $venue['price'] += $item['price'];
            }
            $venue['rating'] /= count($venue['food_items']);
            $venue['price'] /= count($venue['food_items']);
        }

        return $venues;
    }


    private function runSort($arr) : array {
        switch ($this->sort){
            case self::RATING_SORT:
                return RatingSort::sort($arr);
                break;
            case self::DISTANCE_SORT:
                if(isset($this->userLoc)){
                    return DistanceSort::sort($arr, $this->userLoc);
                }
                else{
                    return $arr;
                }
                break;
            case self::PRICE_SORT:
                return PriceSort::sort($arr);
                break;
        }
        
        return $arr;
    }


    public function runQuery()
    {
        $date = date('w');
        if($date == 0){
            $date = 7;
        }

        $query = "SELECT *, f.name AS foodName
FROM food_items f, brand b, locations l, opening_times o
WHERE f.brandName = b.name
      AND o.brandName = b.name
      AND l.name = o.locationName
      AND l.address = o.locationAddress
      AND o.day =" . $this->getDb()->real_escape_string($date) . "
      AND (f.name LIKE '%" . $this->getDb()->real_escape_string($this->search) . "%' OR b.name LIKE '%" . $this->getDb()->real_escape_string($this->search) . "%');";


        /*foreach($this->filters as $filter){
            if(in_array($filter, self::$VENUE_FILTERS)){
                $query .= " AND venues." . $this->getDb()->real_escape_string($filter) . " = 1";
            }
            else {
                $query .= " AND food_items." . $this->getDb()->real_escape_string($filter) . " = 1";
            }

        }*/

        $arr = [];

        $query = $this->query($query);


        while ($onerow = $query->fetch_assoc()) {
            array_push($arr, $onerow);
            //DatabaseLogger::sendLog(var_export($onerow, true));
        }


        return OpenTimeDecorator::addCurrentStates($this->runSort($this->groupVenues($arr)));

    }

    /**
     * @return LatLon
     */
    public function getUserLoc(): LatLon
    {
        return $this->userLoc;
    }

    /**
     * @param LatLon $userLoc
     */
    public function setUserLoc(LatLon $userLoc)
    {
        $this->userLoc = $userLoc;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }


}