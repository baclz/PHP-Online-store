<?php
global $db;

use myfrx\Validator;


$validator = new Validator();
$fillable = ['username', 'email', 'password', 'repassword'];
$data = load($fillable);
$rules = [
    'username' => [
        'required' => true,
        'min' => 1,
        'max' => 20,
    ],
    'email' => [
        'required' => true,
        'min' => 5,
        'max' => 50,
        'email' => true,
        'unique' => 'users:email',
    ],
    'password' => [
        'required' => true,
        'min' => 5,
        'max' => 50,
    ],
    'repassword' => [
        'required' => true,
        'min' => 5,
        'max' => 50,
        'match' => 'password',
    ],
];

$validation = $validator->validate($data, $rules);


if (!$validation->hasErrors()) {
    unset($data['repassword']);
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    if ($db->query("INSERT INTO users (`username`, `password`, `email`) VALUES (:username, :password, :email)", $data)) {
        $_SESSION['user'] = $data['email'];
        redirect('/');
    } else {
        $errDb = 'Failed to send data';
        require VIEWS . '/users/register.tpl.php';
        die;
    }
} else {
    require VIEWS . '/users/register.tpl.php';
    die;
}
