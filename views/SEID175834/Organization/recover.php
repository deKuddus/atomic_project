<?php

require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;

$objBookTitle = new \App\Organization\Organization();
$objBookTitle->setData($_GET);
$objBookTitle->recover();
Utility::redirect('index.php');