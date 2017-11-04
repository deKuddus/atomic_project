<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../../vendor/autoload.php");
use App\Organization\Organization;
use App\Utility\Utility;

$obj = new Organization();
$IDs = $_POST['multiple'];
foreach($IDs as $id ){
    $_GET['id']= $id;
    $obj->setData($_GET);
    $obj->delete();
}

Utility::redirect($path);