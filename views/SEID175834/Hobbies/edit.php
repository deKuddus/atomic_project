<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();
$obj = new \App\Hobbies\Hobbies();
$obj->setData($_GET);
$singleData = $obj->view();
$hobbiesArray = explode(", ", $singleData->hobbies);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Title Add Form</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3" style="width: 500px;height: 150px;padding-top: 50px; padding-left: 130px;">
                <?php echo "<div id='message'> $msg</div>"?>
            </div>
        </div><!-- end of first row -->

        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3 formInfo">
                <h1 style="color: #442a8d;">Hobby Information Entry</h1>
                <form action="update.php" method="post" class="form-group">
                    <div class="form-group">
                        <label for="name">Please Enter your Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $singleData->name?>">
                    </div>

                    <div class="form-group">
                        <label>Please Enter your Name</label>
                        <input type="checkbox" name="Hobbies[]" value="Gardening" <?php if(in_array("Gardening",$hobbiesArray)) echo "checked" ?>>Gardening
                        <input type="checkbox" name="Hobbies[]" value="Reading" <?php if(in_array("Reading",$hobbiesArray)) echo "checked" ?>>Reading
                        <input type="checkbox" name="Hobbies[]" value="Bike Ridding" <?php if(in_array("Bike Ridding",$hobbiesArray)) echo "checked" ?>>Bike Ridding
                        <input type="checkbox" name="Hobbies[]" value="Travelling" <?php if(in_array("Travelling",$hobbiesArray)) echo "checked" ?>>Travelling
                        <input type="checkbox" name="Hobbies[]" value="Singing" <?php if(in_array("Singing",$hobbiesArray)) echo "checked" ?>>Singing
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $singleData->id ?>"><!-- sending id in hidden mode important-->
                        <input type="submit" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end of row -->
</div><!-- end of container -->

<script src="../../../resource/bootstrap/js/jquery.js"></script>

<script>


    jQuery(

        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>


</body>
</html>