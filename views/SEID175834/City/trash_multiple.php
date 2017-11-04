<?php
require_once ("../../../vendor/autoload.php");
use App\City\City;
use App\Utility\Utility;

$obj = new City();
$IDs = $_POST['multiple'];
foreach($IDs as $id ){
    $_GET['id']= $id;
    $obj->setData($_GET);
    $obj->trash();
}

Utility::redirect("trashed.php");