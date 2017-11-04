<?php
require_once("../../../vendor/autoload.php");

use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;

$obj = new ProfilePicture();

$obj->setData($_GET);

$obj->recover();

Utility::redirect("index.php");