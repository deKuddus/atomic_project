<?php
require_once("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Hobbies\Hobbies;

$objHobbies = new Hobbies();

$objHobbies->setData($_GET);

$objHobbies->recover();

Utility::redirect('index.php');