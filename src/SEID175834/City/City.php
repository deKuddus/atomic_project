<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Jun-17
 * Time: 11:06 PM
 */

namespace App\City;
use App\Message\Message;
use PDO;
use App\modal\Database;

class City extends Database
{
  public $id;
  public $name;
  public $cityName;

    public function setData($bookTitle){
        if(array_key_exists("id",$bookTitle)){
            $this->id = $bookTitle["id"];
        }
        if(array_key_exists("name",$bookTitle)){
            $this->name = $bookTitle["name"];
        }
        if(array_key_exists("cityName",$bookTitle)){
            $this->cityName = $bookTitle["cityName"];
        }
    }
    public function store(){
        $name = $this->name;
        $cityName = $this->cityName;

      $sqlQuery = "INSERT INTO `city` (`name`, `city_name`) VALUES (?,?);";
        $dataArray = array($name,$cityName);
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
        $sqlQuery = "Select * from city where is_trashed='No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of index()
    public function view(){
        $sqlQuery = "Select * from city where id=".$this->id;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;
    }// end of view()
    public function update(){
        $name = $this->name;
        $cityName = $this->cityName;

        $sqlQuery = "UPDATE `city` SET `name` = ?, `city_name` = ? WHERE `city`.`id` = $this->id;";
        $dataArray = array($name,$cityName);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);
        if($result){
            Message::message("Success! Data has been updated successfully");
        }
        else{
            Message::message("Error! Data has been not updated");
        }
    }// end of update()
    public function trash(){

        $sqlQuery = "UPDATE `city` SET is_trashed=NOW() WHERE `city`.`id` = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been trashed successfully");
        }
        else{
            Message::message("Error! Data has been not trashed");
        }
    }// end of trash()
    public function trashed(){
        $sqlQuery = "Select * from city where is_trashed<>'No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of trashed()
    public function recover(){

        $sqlQuery = "UPDATE `city` SET is_trashed='No' WHERE `city`.`id` = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been recovered successfully");
        }
        else{
            Message::message("Error! Data has been not recovered");
        }
    }// end of trash()
    public function delete(){
        $sqlQuery = "DELETE from city WHERE id = $this->id;";
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
        if( isset($requestArray['name']) && isset($requestArray['cityName']) )  $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND (`name` LIKE '%".$requestArray['search']."%' OR `city_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['name']) && !isset($requestArray['cityName']) ) $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['name']) && isset($requestArray['cityName']) )  $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND `city_name` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->city_name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->city_name);
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


        $sql = "SELECT * from city  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }//end of pagination

}// end of Book Title()