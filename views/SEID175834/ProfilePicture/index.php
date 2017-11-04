<?php
   require_once("../../../vendor/autoload.php");
        use App\Message\Message;
        use App\Utility\Utility;
        $msg = Message::message();
        $obj = new \App\ProfilePicture\ProfilePicture();
        $allData = $obj->index();

################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) ){

    $someData =  $obj->search($_REQUEST);
}
$availableKeywords = $obj->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################


######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;


if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;



$pages = ceil($recordCount/$itemsPerPage);

$someData = $obj->indexPaginator($page,$itemsPerPage);
$allData= $someData;


$serial = (  ($page-1) * $itemsPerPage ) +1;



if($serial<1) $serial=1;
####################### pagination code block#1 of 2 end #########################################




################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) )$someData =  $obj->search($_REQUEST);

if(isset($_REQUEST['search']) ) {
    $serial = 1;
    $allData=$someData;
}
################## search  block 2 of 5 end ################


?>


<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Document</title>
     <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
     <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../resource/bootstrap/css/jquery-ui.css">
    <script src="../../../resource/bootstrap/js/jquery.js"></script>
    <script src="../../../resource/bootstrap/js/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <?php echo "<div id='message'> $msg</div>"?>
            </div>
            <div class="col-sm-6">
                <!-- required for search, block 4 of 5 start -->

                <div style="">
                    <form id="searchForm" action="index.php"  method="get" style="margin-top: 10px;">
                        <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
                        <input type="checkbox"  name="name"   checked  >By Name
                        <input type="checkbox"  name="pictureName"   checked  >By Picture Name
                        <input hidden type="submit" class="btn-primary" value="search">
                    </form>
                </div>

                <!-- required for search, block 4 of 5 end -->

            </div>
        </div><!-- end of first row -->
        <div class="col-sm-12">
            <h1>Active List - Profile Pictures</h1>
            <form action="trash_multiple.php" id="selectionForm" method="post">
                <div class="nav navbar">
                    <a href="create.php" class="btn btn-info"><span class="glyphicon  glyphicon-circle-arrow-up"> </span>Insert Item</a>
                    <button id="trashMultipleButton" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Trash Multiple</button>
                    <button id="deleteMultipleButton" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete Multiple</button>
                    <a href="pdf.php" class="btn btn-primary "><span class="glyphicon glyphicon-list"></span> <span class="glyphicon  glyphicon-circle-arrow-down"> </span> Download As PDF</a>
                    <a href="xl.php" class="btn btn-success "><span class="glyphicon glyphicon-list"></span> <span class="glyphicon  glyphicon-circle-arrow-down"> </span> Download As Excel</a>
                    <a href="email.php?list=1" class="btn btn-info "><span class="glyphicon glyphicon-list"></span> <span class="glyphicon  glyphicon-envelope"> </span> Email This List</a>
                </div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Checkall <input type="checkbox" name="select_all" id="select_all"></th>
                        <th>Serial</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Profile Picture</th>
                        <th>Action Button</th>
                    </tr>

                    <?php

                    foreach($allData as $records){

                        echo "<tr>
                           <td><input type='checkbox' class='checkbox' name='multiple[]' value='$records->id'></td>
                           <td>$serial</td>
                           <td>$records->id</td>
                           <td>$records->name</td>
                           <td> <img src='images/$records->profile_picture' height='100px' width='100px'>  </td>
                           <td>
                             <a href='view.php?id=$records->id' class='btn btn-primary glyphicon glyphicon-eye-open'> View</a>
                                    <a href='edit.php?id=$records->id' class='btn btn-success glyphicon glyphicon-pencil'> Edit</a>
                                    <a href='trash.php?id=$records->id' class='btn btn-warning glyphicon glyphicon-trash'> Trash</a>
                                    <a href='delete.php?id=$records->id' class='btn btn-danger glyphicon glyphicon-remove' onclick='return confirm_delete()'> Delete</a>
                                    <a href='email.php?id=$records->id' class='btn btn-info glyphicon glyphicon-envelope'> Email</a>
                           </td>

                         </tr>";
                        $serial++;
                    }

                    ?>

                </table>
            </form>
        </div>
        <!--  ######################## pagination code block#2 of 2 start ###################################### -->
        <div align="left" class="container">
            <ul class="pagination">

                <?php

                $pageMinusOne  = $page-1;
                $pagePlusOne  = $page+1;


                if($page>$pages) Utility::redirect("index.php?Page=$pages");

                if($page>1)  echo "<li><a href='index.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";


                for($i=1;$i<=$pages;$i++)
                {
                    if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                    else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

                }
                if($page<$pages) echo "<li><a href='index.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

                ?>

                <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                    <?php
                    if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                    if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                    else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                    if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                    if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                    if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                    if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                    else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                    ?>
                </select>
            </ul>
        </div>
        <!--  ######################## pagination code block#2 of 2 end ###################################### -->

    </div><!-- end of row -->
</div><!-- end of container -->

<div class="container">
    <a href="../../../index.html" class="btn btn-info">Go to Index page</a>
</div>

<script>
    function confirm_delete(){
        return confirm("Are you Sure?");
    }
</script>
<script>

    //select all checkboxes
    $("#select_all").change(function(){  //"select all" change
        var status = this.checked; // "select all" checked status
        $('.checkbox').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
    });

    $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){ //if this item is unchecked
            $("#select_all")[0].checked = false; //change "select all" checked status to false
        }

//check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#select_all")[0].checked = true; //change "select all" checked status to true
        }
    });

</script>

<script>

    $('#deleteMultipleButton').click(function(){

        if(checkEmptySelection()){
            alert("Empty Selection! Please select some record(s) first")
        }
        else{
            var r = confirm("Are you sure you want to delete the selected record(s)?");

            if(r){
                var selectionForm =   $('#selectionForm');
                selectionForm.attr("action","delete_multiple.php");
                selectionForm.submit();
            }
        }
    });

</script>

<script>
    function checkEmptySelection(){

        emptySelection =true;

        $('.checkbox').each(function(){
            if(this.checked)   emptySelection = false;
        });

        return emptySelection;
    }


    $("#trashMultipleButton").click(function(){

        if(checkEmptySelection()){
            alert("Empty Selection! Please select some record(s) first")

        }else {

            var r = $('#selectionForm');
            r.attr("action","trash_multiple.php");
            r.submit();
        }


    }) ;
</script>
<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block 5 of 5 end -->
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
