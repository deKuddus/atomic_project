<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Jun-17
 * Time: 11:06 PM
 */

namespace App\BookTitle;
use App\Message\Message;
use PDO;
use App\modal\Database;

class BookTitle extends Database
{
  public $id;
  public $bookTitle;
  public $authorName;

    public function setData($bookTitle){

        if(array_key_exists("id",$bookTitle)){
            $this->id = $bookTitle["id"];
        }
        if(array_key_exists("bookTitle",$bookTitle)){
            $this->bookTitle = $bookTitle["bookTitle"];
        }
        if(array_key_exists("authorName",$bookTitle)){
            $this->authorName = $bookTitle["authorName"];
        }
    }
    public function store(){

        $sqlQuery = "INSERT INTO `atomic_project` (`book_title`, `author_name`) VALUES (?,?);";
        $dataArray = array($this->bookTitle,$this->authorName);
        $STH=$this->DBH->prepare($sqlQuery);
        $result= $STH->execute($dataArray);

        if($result){
            Message::message("Success! Data has been inserted successfully");
        }
        else{
            Message::message("Error! Data has been not inserted");
        }

    }// end of store();
    public function index(){

        $sqlQuerry = "Select * from atomic_project where is_trashed='No'";
        $STH = $this->DBH->query($sqlQuerry);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of index()
    public function view(){

        $sqlQuerry = "Select * from atomic_project where id=".$this->id;
        $STH = $this->DBH->query($sqlQuerry);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        return $singleData;
    }// end of view()
    public function update(){

        $sqlQuery = "UPDATE atomic_project SET book_title = ?, author_name = ? WHERE id = $this->id;";
        $dataArray = array($this->bookTitle,$this->authorName);
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

        $sqlQuery = "UPDATE atomic_project SET is_trashed=NOW() WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been trashed successfully");
        }
        else{
            Message::message("Error! Data has been not trashed");
        }
    }//end of trash()
    public function trashed(){

        $sqlQuery = "Select * from atomic_project where is_trashed<>'No'";
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }// end of trashed()
    public function recover(){

        $sqlQuery = "UPDATE atomic_project SET is_trashed='No' WHERE id = $this->id;";
        $result= $this->DBH->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been recovered successfully");
        }
        else{
            Message::message("Error! Data has been not recovered");
        }
    }//end of recover()
    public function delete(){
        $sqlQuery = "DELETE from atomic_project WHERE id = $this->id;";
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
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `atomic_project` WHERE `is_trashed` ='No' AND (`book_title` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `atomic_project` WHERE `is_trashed` ='No' AND `book_title` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `atomic_project` WHERE `is_trashed` ='No' AND `author_name` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->book_title);
        }
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->book_title);
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
            $_allKeywords[] = trim($oneData->author_name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->author_name);
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


        $sql = "SELECT * from atomic_project  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }//end of pagination


}//end of Booktitle