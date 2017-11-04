<?php
require_once ("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Utility\Utility;

$obj = new BookTitle();

$obj->setData($_GET);
$obj->trash();
Utility::redirect("trashed.php");