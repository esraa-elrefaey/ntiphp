<?php 
require 'blog.php';

$id = $_GET['id'];
 $user = new Module();

# Check if Id ex ... 
 $sql = "select * from blog where id = $id ";
 $op  = $db->doQuery($sql);

  if( mysqli_num_rows($result) == 1){
     
    # delete op 
     $sql = "delete from blog where id = $id";
     $op  = $db->doQuery($sql);
     if($op){
        $Message =  "Raw Deleted";
     }else{
        $Message =  'Error try Again';
     }


  }else{
       $Message =  "Invalid Id ";
  }


   $_SESSION['Message'] = $Message;

   header("location: view.php");


?>