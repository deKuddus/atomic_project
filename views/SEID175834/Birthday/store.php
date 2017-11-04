<?php
require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;

$objBookTitle = new \App\Birthday\Birthday();
$objBookTitle->setData($_POST);
$objBookTitle->store();
Utility::redirect('create.php');