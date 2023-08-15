<?php

use myfrx\Router;

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';
require CORE . '/funcs.php';

$db_config = require CONFIG . '/db.php';
$db = (\myfrx\Db::getInstanse())->getConnection($db_config);

$router = new Router();
require CONFIG . '/routes.php';
$router->match();
