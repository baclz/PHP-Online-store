<?php
require VIEWS . '/inc/header.php';
?>
<div class="paralax">
    <div class="paralax-left">
        <div class="paralax-x">X-store - your choice</div>
        <div class="paralax-char">Power, comfort, quality</div>
        <div class="paralax-about effect-block"><a href="about">More about us</a></div>
    </div>
    <div class="paralax-right">
        <div class="paralax-c">Open the door to the world of technology with us!</div>
    </div>
</div>
<div class="search-input">
    <div class="container-media-sidebar">
        <div class="media-btn" id="button-media-sidebar">
            <div class="div-button-media"></div>
            <div class="div-button-media"></div>
            <div class="div-button-media"></div>
        </div>
        <div class="media-ul-sidebar display-none" id="ul-media-sidebar">
            <ul>
                <li><a class="gray-hover" href="/?show=all">Show all</a></li>
                <li><a class="gray-hover" href="/?show=phones">Phones</a></li>
                <li><a class="gray-hover" href="/?show=laptops">Laptops</a></li>
                <li><a class="gray-hover" href="/?show=tablets">Tablets</a></li>
            </ul>
        </div>
    </div>
    <input type="text" id="search-input" placeholder="Search...">
</div>
<?php require VIEWS . '/inc/sidebar.php'; ?>

<div class="main-grid">
    <?= $showProduct->show() ?>
</div>

<script src="/assets/js/sidebar.js"></script>
<script src="/assets/js/search.js"></script>
<?php require_once VIEWS . '/inc/footer.php' ?>