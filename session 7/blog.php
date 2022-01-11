<?php

// # TASK *** 7 *** .
// Build a Blog CRUD system with following data  
// Title   =  [required , string]
// Content =  [required,length >50 ch]
// date [required, date] 
// Image   =  [required, file].



require ("dbconnection.php");

function Clean($input){

    $input =  trim($input);
    $input =  strip_tags($input);
    $input =  stripslashes($input);
   return $input;

 
}





if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = Clean($_POST['title']); 
    $content = Clean($_POST['content']);
    $date = Clean($_POST['date']);
    $img_name =Clean($_FILES['img']['name']);
    $temp = Clean($_FILES['img']['tmp_name']);
    $errors = [];


    // validate Title 
    if(empty($title)){
        $errors['title'] = 'field is required';
    }
    elseif(!preg_match("/^[a-zA-Z-' ]*$/",$title)){

        $errors['title'] = "Invalid title only string";
    }

    //validate Content
    if(empty($content)){
     $errors['content'] = 'field is required';
    }
    elseif(strlen($content) < 50){
     $errors['content'] = 'must be  > 50 ch ';
    }

   //validate date 
   if(empty($date)){
    $errors['date'] = 'field is required';
   }


    //validate Profile image
    if(!empty($_FILES['img']['name'])){
        $extensions = array('jpg','png','jpeg');
        $ext = explode('.', $img_name);
       //    $ext = end($arr);
        //  $ext = pathinfo($img_name , PATHINFO_EXTENSION);
         $imgExtension = strtolower(end($ext));
          if(in_array($imgExtension, $extensions)){
            if($_FILES['img']['size'] < 2000000){
              $new_name = md5(uniqid()). '.' .$imgExtension;
              $uploadImg = 'images/'.$new_name ;
              move_uploaded_file($temp,$uploadImg );
            }else{
              echo "file size is too big";
            }
          }else{
            echo "bad extension";
          }
      }else{
      
        $errors['img'] = 'you must upload an image';
      }
 


    // show errors 
    if(count($errors) > 0){
        foreach($errors as $key => $value){
           echo '* '.$key.' : '.$value.'<br>';
        }
        }else{
         echo "valid code";


            //store data
            $sql ="insert into blog (title,content,date,uplode)values('$title','$content','$date','$img_name')";
            $qery=  mysqli_query($con,$sql);
            if($qery){
                $Message= "Row Inserted";
            }else{
                $Message= "Error try again".mysqli_error($con);
               }
               $_SESSION['Message'] = $Message;
                 header('Location: view.php');

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
<h2>Blog Module</h2>



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
 <label for="exampleInputDate">Date</label>
 <input type="date" class="form-control" id="exampleFormControlFile1" name="date">
</div>


<div class="form-group">
 <label for="exampleFormControlFile1">Profile image</label>
 <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>






</body>
</html> 
