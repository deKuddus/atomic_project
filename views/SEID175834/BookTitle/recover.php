<?php
require_once ("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Utility\Utility;

$obj = new BookTitle();

$obj->setData($_GET);
$obj->recover();
Utility::redirect("index.php");