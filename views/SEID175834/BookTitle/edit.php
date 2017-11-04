<?php

require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

$obj = new \App\BookTitle\BookTitle();
$obj->setData($_GET);
$singleData = $obj->view();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Title Add Form</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <style>
        .formInfo{
            border-top: 10px solid #442a8d;
            border-right: 1px solid #442a8d;
            border-left: 1px solid #442a8d;
            border-bottom: 1px solid #442a8d;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6 col-sm-offset-3" style="width: 500px;height: 150px;padding-top: 50px; padding-left: 130px;">
                    <?php echo "<div id='message'> $msg</div>"?>
                </div>
            </div>

            <div class="col-sm-12" style="margin-top: 40px;">
                <div class="col-sm-6 col-sm-offset-3 formInfo">
                    <h1 style="color: #442a8d;">Book Information Entry</h1>

                    <form action="update.php" method="post" class="form-group">

                        <div class="form-group">
                            <label for="bookTitle">Enter Book Title</label>
                            <input type="text" name="bookTitle" value="<?php echo $singleData->book_title ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="authorName">Enter Author Name</label>
                            <input type="text" name="authorName" class="form-control" value="<?php echo $singleData->author_name ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $singleData->id?>">
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