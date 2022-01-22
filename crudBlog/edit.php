
<?php

require 'blog.php';

$id = $_GET['id'];


 $user = new Module();
     $sql = "select * from blog";
      
# Check if Id ex ...
$sql = "select * from blog where id = $id ";
$op  = $db->doQuery($sql);


if (mysqli_num_rows($result) == 1) {
    # fetch data
    $blogData = mysqli_fetch_assoc($result);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: view.php');
}

 
    $user->Blog($title, $content, $img_name);

    if (isset($_SESSION['Message'])) {
        foreach ($_SESSION['Message'] as $key => $value) {
            # code...
            echo $value . '<br>';
        }
        unset($_SESSION['Message']);
    }





if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = Clean($_POST['title']); 
    $content = Clean($_POST['content']);
    $img_name =Clean($_FILES['image']['name']);
    $temp = Clean($_FILES['image']['tmp_name']);
    $errors = [];


    // validate Title 
    
         
         //update date
            $sql = "update blog set title='$title' , content = '$content',date='$date' , uplode = '$img_name' where id  = $id"; 

           $op  = $db->doQuery($sql);

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
















