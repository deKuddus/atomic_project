<?php

require_once ("../../../vendor/autoload.php");
$objProfilePicture = new \App\ProfilePicture\ProfilePicture();
use App\Utility\Utility;
$fileName = time().$_FILES['image']['name'];

$source = $_FILES['image']['tmp_name'];

$destination = "images/".$fileName;

move_uploaded_file($source,$destination);

$_POST['profilePicture'] = $fileName;

$objProfilePicture->setData($_POST);
$objProfilePicture->store();
Utility::redirect('create.php');