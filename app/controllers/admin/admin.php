<?php
global $db;
$phones = $db->query("SELECT * FROM phones")->findAll();
$tablets = $db->query("SELECT * FROM tablets")->findAll();
$laptops = $db->query("SELECT * FROM laptops")->findAll();

$title =  'Admin panel | X-store';
require VIEWS . '/admin/admin.tpl.php';
