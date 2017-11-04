<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Jun-17
 * Time: 11:50 PM
 */

namespace App\modal;

use PDO,PDOException;
class Database
{
   public $DBH;
    public function __construct()
    {
       try{
           $this->DBH = $DBH = new PDO("mysql:host=localhost;dbname=atomic_project", "root", "");
           //echo "Database connection successful";
       }catch(PDOException $error){

             echo $error->getMessage();
       }
    }
}