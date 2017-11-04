<?php
require_once ("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Utility\Utility;

$obj = new BookTitle();
$IDs = $_POST['multiple'];
foreach($IDs as $id ){
    $_GET['id']= $id;
    $obj->setData($_GET);
    $obj->trash();
}

Utility::redirect("trashed.php");