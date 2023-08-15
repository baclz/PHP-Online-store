<?php
require VIEWS . '/inc/header.php';
require VIEWS . '/inc/sidebar.php';
?>

<div class="cart-page-container">
    <div class="cart-page-title">Cart</div>
    <?php if (!isset($_SESSION['cart'])) : ?>
        <div class="cart-none">There is nothing in the cart yet</div>
    <?php else : ?>
        <?php foreach ($_SESSION['cart'] as $category => $id) : ?>
            <?php foreach ($id as $key => $value) : ?>
                <div class="cart-page-product">
                    <div class="cart-page-hr"></div>
                    <div class="cart-page-image">
                        <img src="<?= '/assets/img/productimg/' . $value['tmpimage'] ?>" alt="Cart-product-image">
                    </div>
                    <div class="cart-page-title-product">
                        <?= $value['title'] ?>
                    </div>
                    <div class="cart-page-price">
                        <?= $value['price'] . ' $' ?>
                    </div>
                    <div class="cart-page-delete effect-block">
                        <a href="<?= "cart?do=delete&type={$category}&id={$value['id']}" ?>">Remove</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endforeach ?>
        <div class="cart-isset-session-links">
            <div class="cart-page-payment effect-block">
                <a href="/payment">To pay</a>
            </div>
            <div class="cart-deleteall effect-block"><a href="cart?do=deleteall">Remove everything</a></div>
        </div>
    <?php endif ?>
</div>



<?php require_once VIEWS . '/inc/footer.php' ?>