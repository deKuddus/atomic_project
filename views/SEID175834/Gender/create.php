<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gender Information</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
</head>
<body>

<div class="container">
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../../index.html" style="color: #442a8d; font-weight: bold;">B-69 LOGIC HUNTER</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" style="color: #442a8d; font-weight: bold">View List</a></li>
                        <li><a href="trashed.php" style="color: #442a8d; font-weight: bold"">Trashed List</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3" style="width: 500px;height: 150px;padding-top: 50px; padding-left: 130px;">
                <?php echo "<div id='message'> $msg</div>"?>
            </div>
        </div><!-- end of first row -->

        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3 formInfo">

                <h1 style="color: #442a8d;">Gender Form</h1>

                <form action="store.php" method="post">

                    <div class="form-group">
                        <label for="name">Please Enter your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                    </div>

                    <div class="form-group">
                        <label for="gender">Select Gender</label>
                        <input type="radio" name="gender" id="gender" value="male">Male
                        <input type="radio" name="gender" id="gender" value="female">Female
                    </div>

                    <div class="form-group">
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