<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new \App\City\City();
$obj->setData($_GET);
$singleData = $obj->view();
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
    </div>
    <div class="col-sm-12">
        <div class="col-sm-6 col-sm-offset-3 formInfo">
            <h1 style="color: #442a8d;">City Information Entry</h1>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="name">Please Enter your Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $singleData->name ?>">
                </div>

                <div class="form-group">
                    <label for="cityName">Please Enter City Name</label>
                    <select id="cityName" name="cityName" class="form-control" value="<?php echo $singleData->city ?>">
                        <option>Dhaka</option>
                        <option>Chittagong</option>
                        <option>Sylhet</option>
                        <option>Rajshahi</option>
                        <option>Barishal</option>
                        <option>Khulna</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $singleData->id ?>"><!-- sending id in hidden mode -->
                    <input type="submit" class="form-control btn btn-success">
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

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