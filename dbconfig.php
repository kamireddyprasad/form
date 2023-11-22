<?php
  if(!class_exists("db"))
   {
    class db
      {
        public $dbconnect;
        public function open_connection()
         {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "form";
            $this->dbconnect = mysqli_connect($hostname,$username,$password,$database);
         }
         // get query result
         function get_qresult($get_query)
         {
            $get_result = mysqli_query($this->dbconnect,$get_query);
            return $get_result;
         }
         // mysql connection close
         public function Close_connection()
          {
            mysqli_close($this->dbconnect);
          }
          function fetchNum($select_query)
          {
            $select_result=mysqli_query($this->dbconnect,$select_query);
            $get_num = mysqli_num_rows($select_result);
            return $get_num;
          }
          function fetchArray($select_query)
          {
            $array = mysqli_fetch_assoc($select_query);
            return $array;
          }
          function fetchRow($select_query)
           {
            $select_result=mysqli_query($this->dbconnect,$select_query);
            $select_row = mysqli_fetch_assoc( $select_result);
            return $select_row;
           }
          function insert_id()
          {
            return mysqli_insert_id($this->dbconnect);
          }
      }
      define('TABLE_FORM','form');
      define('TABLE_LOGIN','login');
     
      $obj_db = new db();
      $obj_db->open_connection();
       $timezone =date_default_timezone_set("Asia/Kolkata");
   }
?>