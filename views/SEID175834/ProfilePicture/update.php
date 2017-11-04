<?php
require_once("../../../vendor/autoload.php");

use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;

$obj = new ProfilePicture();

$obj->setData($_POST);
$singleData = $obj->view();

$fileName = $singleData->profile_picture;

if( $_FILES['image']['name']!="" ){

    $fileName = time(). $_FILES['image'] ['name'];

    $source = $_FILES['image'] ['tmp_name'];

    $destination= "Images/".$fileName;

    move_uploaded_file($source,$destination);
}


$_POST['profilePicture'] =$fileName;

$obj->setData($_POST);

$obj->update();

Utility::redirect("index.php");