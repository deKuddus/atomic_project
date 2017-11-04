<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();
$obj = new \App\Organization\Organization();
$obj->setData($_GET);
$singleData = $obj->view();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organization Information</title>
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
            </div><!-- end of first row -->
        </div>

        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3 formInfo">
                <h1 style="color: #442a8d;">Summary of Organization</h1>
                <form action="update.php" method="post">

                    <div class="form-group">
                        <label for="orgaName">Please Enter your Name</label>
                        <input type="text" name="orgaName" class="form-control" value="<?php echo $singleData->orga_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="summary">Please Enter your Name</label>
                        <textarea type="text" name="summary" class="form-control" id="text_area">
                            <?php echo $singleData->summary ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $singleData->id?>"><!-- sending id in hidden mode -->
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