var searchField = document.getElementById('search-input');

searchField.addEventListener('input', function () {
    var searchText = searchField.value;
    var cards = document.getElementsByClassName('main-card');

    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var title = card.querySelector('.card-title').innerText;
        if (title.indexOf(searchText) !== -1) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    }
});
