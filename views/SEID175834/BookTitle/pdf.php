<?php
require_once ('../../../vendor/autoload.php');
use App\BookTitle\BookTitle;

$obj= new BookTitle();
$allData = $obj->index();


$trs="";
$sl=0;

    foreach($allData as $row) {
        $id =  $row->id;
        $bookName = $row->book_title;
        $authorName =$row->author_name;
        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $bookName </td>";
        $trs .= "<td width='250'> $authorName </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM

<head>
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
</head>


<div class="table-responsive">
            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th align='left' style='color:green'>Serial</th>
                    <th align='left' style='color:green'>ID</th>
                    <th align='left' style='color:green'>Book Name</th>
                    <th align='left' style='color:green'>Author Name</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('BookTitle.pdf', 'D');


