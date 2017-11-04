<?php
require_once ("../../../vendor/autoload.php");
use App\Birthday\Birthday;
use App\Utility\Utility;

$obj = new Birthday();

$obj->setData($_GET);
$obj->trash();
Utility::redirect("trashed.php");