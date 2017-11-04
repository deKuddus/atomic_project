<?php
require_once("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Gender\Gender;

$objGender = new Gender();

$objGender->setData($_POST);

$objGender->update();

Utility::redirect('index.php');