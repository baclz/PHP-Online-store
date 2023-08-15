<?php
global $db;

use myfrx\Validator;

$validator = new Validator();
$fillable = ['email', 'password'];
$data = load($fillable);
$rules = [
    'email' => [
        'required' => true,
        'min' => 5,
        'max' => 50,
        'email' => true,
    ],
    'password' => [
        'required' => true,
        'min' => 5,
        'max' => 50,
    ],
];

$validation = $validator->validate($data, $rules);


if (!$validation->hasErrors()) {
    if (!$db->query("SELECT * FROM users WHERE email = ?", [$data['email']])->getColumn()) {
        $errLog = 'User with this email does not exist';
        require VIEWS . '/users/login.tpl.php';
        die;
    } else {
        if (password_verify($data['password'], ($db->query("SELECT password FROM users WHERE email = ?", [$data['email']])->find())['password'])) {
            $_SESSION['user'] = $data['email'];
            redirect('/');
        } else {
            $errLog = 'Incorrect password';
            require VIEWS . '/users/login.tpl.php';
            die;
        }
    }
} else {
    require VIEWS . '/users/login.tpl.php';
    die;
}
