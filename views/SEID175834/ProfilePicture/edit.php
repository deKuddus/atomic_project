<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Utility\Utility;
use App\Message\Message;

if(!isset($_GET['id'])){

    Message::message("You can't visit view.php without id(i.e.; view.php?id=15");
    Utility::redirect("index.php");

}
$message = Message::message();
$obj = new\App\ProfilePicture\ProfilePicture();

$obj->setData($_GET);
$singleData = $obj->view();

?>

<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Profile Picture Form</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3" style="width: 500px;height: 150px;padding-top: 50px; padding-left: 130px;">
                <?php echo "<div id='message'> $message</div>"?>
            </div><!-- end of first row -->
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-3 formInfo">
                <h1 style="color: #442a8d;">City Information Entry</h1>
                <form class="form-group" action="update.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Please Enter your Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $singleData->name?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Choose Your Profile Picture</label>
                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                        <img src="images/<?php echo $singleData->profile_picture ?>" alt="image" height="300px" width="300px" class="img-responsive">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $singleData->id?>">
                        <input type="submit" class="form-control btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div><!-- end of second row -->
    </div><!-- end of row -->
</div><!-- end of container -->

<script src="../../../resource/bootstrap/js/jquery.js"></script>

<script>

    jQuery(
        function ($) {

            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);

        }
    )
</script>

</body>
</html>
