<?php

function dump($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function dd($data)
{
    dump($data);
    die;
}

function abort($code = 404)
{
    require VIEWS . "/errors/{$code}.tpl.php";
    die;
}

function load($fieldname)
{
    $data = [];
    foreach ($_POST as $k => $v) {
        if (in_array($k, $fieldname)) {
            $data[$k] = trim($v);
        }
    }
    return $data;
}

function check_auth()
{
    return isset($_SESSION['user']);
}

function redirect($url = '')
{
    if ($url) {
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER['HTTP_REFETET']) ? $_SERVER['HTTP_REFETET'] : PATH;
    }
    header("Location: {$redirect}");
    die;
}

function old($filename)
{
    return isset($_POST[$filename]) ? h($_POST[$filename]) : '';
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}
