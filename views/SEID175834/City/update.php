<?php

require_once ("../../../vendor/autoload.php");
use App\Utility\Utility;
$objBookTitle = new \App\City\City();
$objBookTitle->setData($_POST);
$objBookTitle->update();

Utility::redirect('index.php');