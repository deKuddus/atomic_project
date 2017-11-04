<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../../vendor/autoload.php");
use App\Gender\Gender;
use App\Utility\Utility;

$obj = new Gender();

$obj->setData($_GET);
$obj->delete();
Utility::redirect($path);