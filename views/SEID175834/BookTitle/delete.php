<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Utility\Utility;

$obj = new BookTitle();

$obj->setData($_GET);
$obj->delete();
Utility::redirect($path);