<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
$msg = Message::getMessage();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Title Add Form</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<div class="container-fluid background-edit">
<div class="container ">
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
        </div>

        <div class="col-sm-12" style="margin-top: 40px;">
            <div class="col-sm-6 col-sm-offset-3 formInfo">
                <h1 style="color: #442a8d;">Book Information Entry</h1>
                <form action="store.php" method="post" class="form-group">

                    <div class="form-group">
                        <label for="bookTitle">Enter Book Title</label>
                        <input type="text" name="bookTitle" class="form-control" placeholder="Book Title">
                    </div>

                    <div class="form-group">
                        <label for="authorName">Enter Author Name</label>
                        <input type="text" name="authorName" class="form-control" placeholder="Author Name">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success">
                    </div>

                </form>
            </div>
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