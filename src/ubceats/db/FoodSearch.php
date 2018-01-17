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
            if(!isset($venues[$foodItem['venue_id']])){
                $venues[$foodItem['venue_id']] = [
                    "food_items" => [],
                    "rating" => 0,
                    "price" => 0,
                    "url" => $foodItem['url'],
                    "phoneNumber" => $foodItem['phoneNumber'],
                    "lat" => $foodItem['lat'],
                    "lon" => $foodItem['lon'],
                    "name" => $foodItem['venue_name'],
                    "description" => $foodItem['venue_description'],
                    "mealPlan" => $foodItem['mealPlan'],
                    "flexDollars" => $foodItem['flexDollars'],
                    "opensAt" => ($foodItem['opensAt'] < 1000 &&  $foodItem['opensAt'] != -1 ? "0" . $foodItem['opensAt'] : $foodItem['opensAt']),
                    "closesAt" => ($foodItem['closesAt'] < 1000 && $foodItem['closesAt'] != -1? "0" . $foodItem['closesAt'] : $foodItem['closesAt']),
                    "venue_id" => $foodItem['venue_id']
                ];
            }

            $venues[$foodItem['venue_id']]["food_items"][] = [
               "price" => $foodItem['price'],
               "item_name" => ucwords(strtolower($foodItem['item_name'])),
               "rating" => $foodItem['rating'],
                "gluten_free" => $foodItem['gluten_free'],
                "vegan" =>  $foodItem['vegan'],
                "vegetarian" => $foodItem['vegetarian'],
                "food_item_id" => $foodItem['food_item_id']
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

        $query = "SELECT food_items.id AS food_item_id,
	   food_items.item_name,
	   food_items.price,
	   food_items.vegetarian,
	   food_items.vegan,
	   food_items.gluten_free,
	   food_items.rating,
	   venues.id AS venue_id,
	   venues.name AS venue_name,
	   venues.venueDesc AS venue_description,
	   venues.lat,
	   venues.lon,
	   venues.mealPlan,
	   venues.flexDollars,
	   venues.url,
	   venues.phoneNumber,
	   hours.opensAt,
	   hours.closesAt
  FROM food_items
  JOIN venues ON venues.id = food_items.venue_id
  JOIN hours  ON venues.id = hours.venue_id
  WHERE (food_items.item_name LIKE '%" . $this->getDb()->real_escape_string($this->search) . "%' OR food_items.keywords LIKE '%" . $this->getDb()->real_escape_string($this->search) . "%' OR venues.name LIKE '%" . $this->getDb()->real_escape_string($this->search) . "%') AND hours.day = " . $this->getDb()->real_escape_string($date) ;

        foreach($this->filters as $filter){
            if(in_array($filter, self::$VENUE_FILTERS)){
                $query .= " AND venues." . $this->getDb()->real_escape_string($filter) . " = 1";
            }
            else {
                $query .= " AND food_items." . $this->getDb()->real_escape_string($filter) . " = 1";
            }

        }

        $arr = [];

        $query = $this->getDb()->query($query);


        while ($onerow = $query->fetch_assoc()) {
            array_push($arr, $onerow);
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