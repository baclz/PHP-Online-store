var headerMedia = document.getElementById('button-media-header');
var headerUl = document.getElementById('ul-media-header');

headerMedia.addEventListener('click', function () {
    headerUl.classList.toggle('display-none');
})