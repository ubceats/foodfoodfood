function doSearchMain(e) {
    e.preventDefault();
    if(document.getElementById('search-term').value !== '') {
        window.location.href = '/search/' + encodeURIComponent(document.getElementById('search-term').value); //relative to domain
    }
}

var url = null;

function doSearchRefine(e) {
    e.preventDefault();

    if(url !== null) return; // THIS IS A LOCK :P

    if(document.getElementById('filter-page-search').value === '') {
        return;
    }

    var sort = document.getElementById('sortOptions').value;

    url = '/search/' + document.getElementById('filter-page-search').value + '?sort=' + sort;
    if(document.getElementById('veggieCheck').checked){
        url += "&vegetarian=true";
    }
    if(document.getElementById('veganCheck').checked){
        url += "&vegan=true";
    }
    if(document.getElementById('gfCheck').checked){
        url += "&gluten_free=true";

    }
    if(document.getElementById('mealPlanCheck').checked){
        url += "&mealPlan=true";
    }
    if(document.getElementById('flexDollarsCheck').checked){
        url += "&flexDollars=true";
    }

    if(sort === "1"){
        getLocation();
    }
    else{
        window.location.href = url; //relative to domain
        url = null;
    }
}

function getLocation()
{
    if( navigator.geolocation )
    {
        // Call getCurrentPosition with success and failure callbacks
        navigator.geolocation.getCurrentPosition( gotLocation, failedLocation );
    }
    else
    {
        alert("Sorry, your browser does not support geolocation services.");
    }
}

function gotLocation(position)
{

    url += "&lat=" + position.coords.latitude;
    url += "&lon=" + position.coords.longitude;

    window.location.href = url; //relative to domain
    url = null;
}

function failedLocation()
{
    alert("Can't locate you. Try using another sort?");
}

if(document.getElementById('searchForm')) {
    document.getElementById('searchForm').addEventListener('submit', doSearchMain, false);
}

if(document.getElementById('refineSearchForm')) {
    document.getElementById('refineSearchForm').addEventListener('submit', doSearchRefine, false);
}

function voteUp(id) {
    $.get('/vote/' + id + '/up',function(data){ console.log(data) });
    document.getElementById('rating' + id).innerHTML++;

}
function voteDown(id) {
    $.get('/vote/' + id + '/down',function(data){ console.log(data) });
    document.getElementById('rating' + id).innerHTML--;
}