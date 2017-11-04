<?php
   require_once("../../../vendor/autoload.php");

        use App\Message\Message;
        $msg = Message::message();
        $obj = new \App\City\City();
        $allData = $obj->trashed();

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
        <div class="col-sm-12">
            <div class="col-sm-6 ">
                <?php echo "<div id='message'>  $msg </div>"?>
            </div>
        </div> <!--end first row-->
        <div class="col-sm-12">

            <h1>Trashed List - City</h1>

            <form action="recover_multiple.php" method="post" id="selectionForm">
                <div class="nav navbar">
                    <a href="index.php" class="btn btn-info">Back to Active List</a>
                    <input type="submit" value="Recover Multiple" class="btn btn-success">
                    <input id="deleteMultiple" type="button" value="Delete Multiple" class="btn btn-danger">
                </div><!-- end navbar -->

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Checkall <input type="checkbox" name="select_all" id="select_all"></th>
                        <th>Serial</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Action Button</th>
                    </tr>

                    <?php
                    $serial=1;
                    foreach($allData as $records){

                        echo "<tr>
                               <td><input type='checkbox' class='checkbox' name='multiple[]' value='$records->id'></td>
                               <td>$serial</td>
                               <td>$records->id</td>
                               <td>$records->name</td>
                               <td>$records->city_name</td>
                               <td>
                                <a href='view.php?id=$records->id' class='btn btn-primary'>View</a>
                                <a href='edit.php?id=$records->id' class='btn btn-success'>Edit</a>
                                <a href='recover.php?id=$records->id' class='btn btn-warning'>Recover</a>
                                <a href='delete.php?id=$records->id' class='btn btn-danger' onclick='return confirm_delete()'>Delete</a>
                               </td>

                             </tr>";
                        $serial++;
                    }// end of foreach loop

                    ?>
                </table><!-- end table -->
            </form><!-- end form -->

        </div><!-- end of second row -->
    </div>
</div>


<script src="../../../resource/bootstrap/js/jquery.js"></script>
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
    $("#deleteMultiple").click(function(){

        var r = confirm(" Are you sure you want to delete selected record(s)? ");

        if(r==true){

            var selectionForm = $("#selectionForm");
            selectionForm.attr("action","delete_multiple.php");
            selectionForm.submit();

        }
    });
</script>
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
