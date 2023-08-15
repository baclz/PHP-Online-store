var sidebarMedia = document.getElementById('button-media-sidebar');
var sidebarUl = document.getElementById('ul-media-sidebar');

sidebarMedia.addEventListener('click', function () {
    sidebarUl.classList.toggle('display-none');
})