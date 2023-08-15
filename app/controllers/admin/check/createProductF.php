<?php
global $db;
$title = 'Product creation | X-store';

use myfrx\Validator;

$validator = new Validator();
$fillable = ['form-categories', 'title', 'price', 'brand', 'excerpt', 'memory', 'camera', 'os', 'diagonal', 'color'];
$data = load($fillable);

if ($data['form-categories']  == 'phones' || $data['form-categories']  == 'tablets' || $data['form-categories']  == 'laptops') {
    $rules = [
        'form-categories' => [
            'required' => true,
        ],
        'title' => [
            'required' => true,
            'min' => 5,
            'max' => 49,
        ],
        'brand' => [
            'required' => true,
            'min' => 1,
            'max' => 49,
        ],
        'excerpt' => [
            'required' => true,
            'min' => 5,
            'max' => 49,
        ],
        'memory' => [
            'required' => true,
            'min' => 2,
            'max' => 10,
            'int' => true,
        ],
        'camera' => [
            'required' => true,
            'min' => 1,
            'max' => 10,
            'int' => true,
        ],
        'os' => [
            'required' => true,
            'min' => 3,
            'max' => 20,
        ],
        'diagonal' => [
            'required' => true,
            'min' => 1,
            'max' => 20,
            'int' => true,
        ],
        'color' => [
            'required' => true,
            'min' => 2,
            'max' => 30,
        ],
        'price' => [
            'required' => true,
            'min' => 1,
            'max' => 20,
            'int' => true,
        ],
    ];

    $validation = $validator->validate($data, $rules);
} else {
    dd('Form-categories not valid');
}

if (!$validation->hasErrors()) {
    $errImg = '';
    if (!empty($_FILES['img']['name'])) {
        $imgName = str_replace(' ', '_', trim((time() . '_' . $_FILES['img']['name'])));
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = WWW . '/assets/img/productimg/' . $imgName;
        if (strpos($fileType, 'image') === false) {
            $errImg = 'Only image can be uploaded';
            require VIEWS . '/admin/createProduct.tpl.php';
            die;
        } else {
            $result = move_uploaded_file($fileTmpName,  $destination);
        }
    } else {
        $errImg = 'Failed to get image';
        require VIEWS . '/admin/createProduct.tpl.php';
        die;
    }
    if (empty(trim($errImg))) {
        $table = $data['form-categories'];
        unset($data['form-categories']);
        $data['tmpimage'] = $imgName;
        if ($db->query("INSERT INTO $table (`title`, `brand`, `excerpt`, `memory`, `camera`, `os`, `diagonal`, `color`, `tmpimage`, `price`) VALUES (:title, :brand, :excerpt, :memory, :camera, :os, :diagonal, :color, :tmpimage, :price)", $data)) {
            redirect('/');
        } else {
            $errDb = 'Failed to send data';
            require VIEWS . '/admin/createProduct.tpl.php';
            die;
        }
    }
} else {
    require VIEWS . '/admin/createProduct.tpl.php';
    die;
}
