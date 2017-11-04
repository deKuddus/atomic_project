<?php
/**
 * Created by PhpStorm.

 */

namespace App\Birthday;


use App\modal\Database;
use App\Message\Message;
use PDO;
class Birthday extends Database
{
    public $id;
    public $name;
    public $birthday;

    public function setData($postArray)
    {
        if (array_key_exists("id",$postArray))
            $this->id = $postArray["id"];
        if (array_key_exists("name",$postArray))
            $this->name = $postArray["name"];
        if (array_key_exists("birthday",$postArray))
            $this->birthday = $postArray["birthday"];
    }

    public function store(){

        $sqlQuery = "INSERT INTO `birthday_table` (`name`, `birthday`) VALUES (?,?);";
        $dataArray = array($this->name,$this->birthday);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);

        if($result){
            Message::message("Success! Data has been inserted successfully");
        }
        else{
            Message::message("Error! Data has been not inserted");
        }

    }// end of store();
    public function index()
    {
        $sqlQuery = "SELECT * FROM birthday_table where is_trashed='No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    }//end of index()
    public function view()
    {
        $sqlQuery = "SELECT * FROM birthday_table where id=".$this->id;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;

    }//end of index()
    public function update(){

        $sqlQuery = "UPDATE birthday_table SET name = ?, birthday = ? WHERE id = $this->id;";
        $dataArray = array($this->name,$this->birthday);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);
        if($result){
            Message::message("Success! Data has been updated successfully");
        }
        else{
            Message::message("Error! Data has been not updated");
        }

    }// end of update();
    public function trash(){

        $sqlQuery = "UPDATE birthday_table SET is_trashed=NOW() WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been trashed successfully");
        }
        else{
            Message::message("Error! Data has been not trashed");
        }
    }//end of trash()
    public function trashed(){

        $sqlQuery = "Select * from birthday_table where is_trashed<>'No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of trashed()
    public function recover(){

        $sqlQuery = "UPDATE birthday_table SET is_trashed='No' WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been recovered successfully");
        }
        else{
            Message::message("Error! Data has been not recovered");
        }
    }//end of recover()
    public function delete(){
        $sqlQuery = "DELETE from birthday_table WHERE id = $this->id;";
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
        if( isset($requestArray['name']) && isset($requestArray['birthday']) )  $sql = "SELECT * FROM `birthday_table` WHERE `is_trashed` ='No' AND (`name` LIKE '%".$requestArray['search']."%' OR `birthday` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['name']) && !isset($requestArray['birthday']) ) $sql = "SELECT * FROM `birthday_table` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['name']) && isset($requestArray['birthday']) )  $sql = "SELECT * FROM `birthday_table` WHERE `is_trashed` ='No' AND `birthday` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->name);
        }
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
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
            $_allKeywords[] = trim($oneData->birthday);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->birthday);
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


        $sql = "SELECT * from birthday_table  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }//end of pagination

}// end of BirthDay