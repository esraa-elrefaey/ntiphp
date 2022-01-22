<?php 

class DB{

  var $server ="localhost";
  var $dbName =" module";
  var $dbUser ="root";
  var $dbPassword ="";

  var $con = null;

      function __construct(){

        $this->con =   mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);

        if(!$this->con){
            die("Error : ".mysqli_connect_error());
        }
      }

       
       function doQuery($sql){
           
          $result = mysqli_query($this->con,$sql);
          return $result;
       }


      function __destruct(){
         return  mysqli_close($this->con);
      }

}
