<?php
require VIEWS . '/inc/header.php';
require VIEWS . '/inc/sidebar.php'; ?>
<div class="show-container">
    <div class="show-img">
        <img src="<?= '/assets/img/productimg/' . $product['tmpimage'] ?>" alt="Phone-image">
    </div>
    <div class="show-title">
        <?= h($product['title']) ?>
    </div>
    <div class="show-excerpt">
        <?= h($product['excerpt']) ?>
        <div class="show-hr"></div>
    </div>
    <div class="show-char">
        <div class="show-brand">
            <?= 'Brand: ' . h($product['brand']) ?>
        </div>
        <div class="show-memory">
            <?= 'Memory: ' . h($product['memory']) . ' Gbyte.' ?>
        </div>
        <div class="show-camera">
            <?= 'Camera: ' . h($product['camera']) . ' Megapixels' ?>
        </div>
        <div class="show-os">
            <?= 'Operating system: ' . h($product['os']) ?>
        </div>
        <div class="show-diagonal">
            <?= 'Diagonal: ' . h($product['diagonal']) . ' Inches' ?>
        </div>
        <div class="show-color">
            <?= 'Color: ' . h($product['color']) ?>
        </div>
        <div class="show-hr"></div>
    </div>
    <div class="show-links">
        <div class="show-price">
            <?= h($product['price']) . ' $' ?>
        </div>
        <div class="show-add-cart effect-block">
            <a class="card-add" href="/cart?do=add&type=phones&id=<?= $product['id'] ?>">Add to cart</a>
        </div>
    </div>
</div>



<?php require_once VIEWS . '/inc/footer.php' ?>