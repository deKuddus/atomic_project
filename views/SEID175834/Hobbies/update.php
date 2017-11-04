<?php
require_once("../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Hobbies\Hobbies;

$objHobbies = new Hobbies();


$strHobbies = implode(", " , $_POST['Hobbies']);

$_POST['hobbies'] = $strHobbies;

$objHobbies->setData($_POST);

$objHobbies->update();

Utility::redirect('index.php');