<?php
global $db;
$type = $_GET['type'] ?? 'abort';
$id = $_GET['id'] ?? 'abort';

if ($type !== 'phones' && $type !== 'laptops' && $type !== 'tablets') {
    abort();
}

$product = $db->query("SELECT * FROM $type WHERE id = ? LIMIT 1", [$id])->findOrFail();

if (!empty($product)) {
    $imageDelete = WWW . '/assets/img/productimg/' . $product['tmpimage'];
    if (file_exists($imageDelete)) {
        unlink($imageDelete);
    }
    $db->query("DELETE FROM $type WHERE id = ?", [$id]);
    redirect('/admin');
} else {
    abort();
}
