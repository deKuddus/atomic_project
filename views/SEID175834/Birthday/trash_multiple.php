<?php
require_once ("../../../vendor/autoload.php");
use App\Birthday\Birthday;
use App\Utility\Utility;

$obj = new Birthday();
$IDs = $_POST['multiple'];
foreach($IDs as $id ){
    $_GET['id']= $id;
    $obj->setData($_GET);
    $obj->trash();
}

Utility::redirect("trashed.php");