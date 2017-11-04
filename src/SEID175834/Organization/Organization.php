<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04-Jun-17
 * Time: 1:28 PM
 */

namespace App\Organization;
use App\Message\Message;
use PDO;
use App\modal\Database;

class Organization extends Database
{ public $id;
  public $orgaName;
  public $summary;

    public function setData($bookTitle){
        if(array_key_exists("id",$bookTitle)){
            $this->id = $bookTitle["id"];
        }
        if(array_key_exists("orgaName",$bookTitle)){
            $this->orgaName = $bookTitle["orgaName"];
        }
        if(array_key_exists("summary",$bookTitle)){
            $this->summary = $bookTitle["summary"];
        }
    }
    public function store(){
        $orgaName = $this->orgaName;
        $summary = $this->summary;

        $sqlQuery = "INSERT INTO `organization_summary` (`orga_name`, `summary`) VALUES (?,?);";
        $dataArray = array($orgaName,$summary);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);

        if($result){
            Message::message("Success! Data has been inserted successfully");
        }
        else{
            Message::message("Error! Data has been not inserted");
        }

    }//end of store()
    public function index(){
        $sqlQuery = "Select *from organization_summary where is_trashed='No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }//end of index()
    public function view(){
        $sqlQuery = "Select *from organization_summary where id=".$this->id;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;
    }//end of index()
    public function update(){
        $orgaName = $this->orgaName;
        $summary = $this->summary;

        $sqlQuery = "UPDATE `organization_summary` SET `orga_name` = ?, `summary` = ? WHERE `organization_summary`.`id` = $this->id;";
        $dataArray = array($orgaName,$summary);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);
        if($result){
            Message::message("Success! Data has been updated successfully");
        }
        else{
            Message::message("Error! Data has been not updated");
        }
    }//end of update()
    public function trash(){

        $sqlQuery = "UPDATE organization_summary SET is_trashed=NOW() WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been trashed successfully");
        }
        else{
            Message::message("Error! Data has been not trashed");
        }
    }//end of trash()
    public function trashed(){

        $sqlQuery = "Select * from organization_summary where is_trashed<>'No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of trashed()
    public function recover(){

        $sqlQuery = "UPDATE organization_summary SET is_trashed='No' WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been recovered successfully");
        }
        else{
            Message::message("Error! Data has been not recovered");
        }
    }//end of recover()
    public function delete(){
        $sqlQuery = "DELETE from organization_summary WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been deleted successfully");
        }
        else{
            Message::message("Error! Data has been not deleted");
        }

    }//end of delete()
    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['name']) && isset($requestArray['organization']) )  $sql = "SELECT * FROM `organization_summary` WHERE `is_trashed` ='No' AND (`orga_name` LIKE '%".$requestArray['search']."%' OR `summary` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['name']) && !isset($requestArray['organization']) ) $sql = "SELECT * FROM `organization_summary` WHERE `is_trashed` ='No' AND `orga_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['name']) && isset($requestArray['organization']) )  $sql = "SELECT * FROM `organization_summary` WHERE `is_trashed` ='No' AND `summary` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();
        return $someData;
    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->orga_name);
        }
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->orga_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end

        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->summary);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->summary);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end
        return array_unique($_allKeywords);
    }// get all keywords

    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from organization_summary  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }//end of pagination

}//end of Oraganization