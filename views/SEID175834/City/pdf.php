<?php
require_once ('../../../vendor/autoload.php');
use App\City\City;

$obj= new City();
$allData = $obj->index();


$trs="";
$sl=0;

    foreach($allData as $row) {
        $id =  $row->id;
        $name = $row->name;
        $cityName =$row->city_name;
        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $name </td>";
        $trs .= "<td width='250'> $cityName </td>";

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
                    <th align='left' style='color:green'>Name</th>
                    <th align='left' style='color:green'>City Name</th>

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
$mpdf->Output('CityInfo.pdf', 'D');


