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


    url = '/search/' + document.getElementById('filter-page-search').value;
    window.location.href = url; //relative to domain
    url = null;
}




if(document.getElementById('searchForm')) {
    document.getElementById('searchForm').addEventListener('submit', doSearchMain, false);
}

if(document.getElementById('refineSearchForm')) {
    document.getElementById('refineSearchForm').addEventListener('submit', doSearchRefine, false);
}
