<?php
$title = "Payment | X-store";

if (!isset($_SESSION['cart'])) {
    redirect('/cart');
} else {
    unset($_SESSION['cart']);
}

require VIEWS . '/payment.tpl.php';
