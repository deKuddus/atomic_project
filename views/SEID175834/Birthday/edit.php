<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 5/29/2017
 * Time: 11:14 AM
 */
if (!isset($_SESSION)) session_start();
require_once("../../../vendor/autoload.php");
use App\Message\Message;
$msg = Message::getMessage();
echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new \App\Birthday\Birthday();
$obj->setData($_GET);
$singleData = $obj->view();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Birthday</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>

    <script>
        $(function () {
            $("#birthday").datepicker({dateFormat: 'yy-mm-dd'});
        });
    </script>

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
                <h3 align="center">Birthday Information Entry</h3>
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $singleData->name?>">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Your Birthday</label>
                        <input type="text" name="birthday" id="birthday" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $singleData->birthday?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $singleData->id ?>">
                        <input type="submit" class="btn btn-success form-control"  value="Update">
                    </div>

                </form>
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
