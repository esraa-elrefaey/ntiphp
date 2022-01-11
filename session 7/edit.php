<?php

require 'dbConnection.php';

$id = $_GET['id'];

# Check if Id ex ...
$sql = "select * from blog where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    # fetch data
    $blogData = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: view.php');
}

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
         
         //update date
            $sql = "update blog set title='$title' , content = '$content',date='$date' , uplode = '$img_name' where id  = $id"; 

            $op  = mysqli_query($con,$sql);

            if($op){
                $Message = "Raw Updated";
            }else{
                $Message = "Error Try Again ".mysqli_error($con) ;
            }

            $_SESSION['Message'] = $Message;
            header("Location: view.php");

}

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update</h2>


        <form action="edit.php?id=<?php echo $blogData['id']; ?>" method="post">

            
        <div class="form-group">
        <label for="exampleInputName">Title</label>
        <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter Title" value="<?php echo $blogData['title']; ?>">
        </div>




        <div class="form-group">
        <label for="exampleInputaddress">Content</label>
        <input type="text"   class="form-control" id="exampleInputaddress" name="content" placeholder="Content" value="<?php echo $blogData['content']; ?>">
        </div>

        <div class="form-group">
        <label for="exampleInputDate">Date</label>
        <input type="date" class="form-control" id="exampleFormControlFile1" name="date" value="<?php echo $blogData['date']; ?>">
        </div>


        <div class="form-group">
        <label for="exampleFormControlFile1">Profile image</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img" value="<?php echo $blogData['upblode']; ?>">
        </div>




            <button type="submit" class="btn btn-primary">Edit</button>
        </form>



</body>

</html>