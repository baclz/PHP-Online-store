<?php
global $db;
$id = $_GET['id'] ?? 0;
$product = $db->query("SELECT * FROM phones WHERE id = ? LIMIT 1", [$id])->findOrFail();

$title = "{$product['title']} | X-store";
require_once VIEWS . '/product/phonesShow.tpl.php';
