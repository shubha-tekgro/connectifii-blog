document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('blogSearch');
    const searchBtn = document.getElementById('searchBtn');
    const blogGrid = document.getElementById('blogGrid');

    function performSearch() {
        const searchTerm = searchInput.value;

        fetch(ajax_object.ajax_url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=blog_search&search=' + encodeURIComponent(searchTerm)
        })
        .then(response => response.text())
        .then(data => {
            blogGrid.innerHTML = data;
        });
    }

    // Trigger search on button click
    searchBtn.addEventListener('click', function(e){
        e.preventDefault();
        performSearch();
    });

    // Trigger search on Enter key
    searchInput.addEventListener('keypress', function(e){
        if(e.key === 'Enter'){
            e.preventDefault();
            performSearch();
        }
    });
});
