<?php
require 'blog.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $title = Clean($_POST['title']); 
    $content = Clean($_POST['content']);
    $img_name =Clean($_FILES['image']['name']);
    $temp = Clean($_FILES['image']['tmp_name']);
    $errors = [];

    $user = new Module();

     $sql = "insert into users (name,email,password) values ('$this->name','$this->email','$this->password')";
         $op  = $db->doQuery($sql);

         if($op){
             $Message = ['Raw Inserted'];
         }else{
             $Message = ['Error Try Again !!!!!'];
         }
 
    $user->Blog($title, $content, $img_name);

    if (isset($_SESSION['Message'])) {
        foreach ($_SESSION['Message'] as $key => $value) {
            # code...
            echo $value . '<br>';
        }
        unset($_SESSION['Message']);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Blog Module</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2>Create Blog Module</h2>



<form   action="<?php echo $_SERVER['PHP_SELF'] ; ?>"  method="post" enctype="multipart/form-data">

<input type="hidden"   value="1" name="Blog Module">

<div class="form-group">
 <label for="exampleInputName">Title</label>
 <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter Title">
</div>




<div class="form-group">
 <label for="exampleInputaddress">Content</label>
 <input type="text"   class="form-control" id="exampleInputaddress" name="content" placeholder="Content">
</div>



<div class="form-group">
 <label for="exampleFormControlFile1">Profile image</label>
 <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>






</body>
</html> 
