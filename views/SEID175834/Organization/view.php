<?php
require_once("../../../vendor/autoload.php");

use App\Message\Message;
$msg = Message::message();
echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new \App\Organization\Organization();
$obj->setData($_GET);
$singleData = $obj->view();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Individual Information</h1>
        <a href="index.php" class="btn btn-info" style="margin-bottom: 5px;">Index List</a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name of Organization</th>
                <th>Summary</th>
            </tr>

            <?php
            echo "<tr>
               <td>$singleData->id</td>
               <td>$singleData->orga_name</td>
               <td>$singleData->summary</td>
             </tr>";
            ?>
        </table>
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
