
<?php 

// *** task 4 ***

//Create a form with the following inputs (name, email, password, address, gender, linkedin url)
//  Validate inputs then return message to user . 
// * validation rules ... 
// name  = [required , string]
// email = [required,email]
// password = [required,min = 6]
// address = [required,length = 10 chars]
// gender = [required]
// linkedin url = [reuired | url]
// Profile image

// - then create a profilePage.php to display Student Data . 
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $address = $_POST['address'];
       $gender= $_POST["gender"];
       $linkedinUrl = $_POST['linkedinUrl'];
       $img_name = $_FILES['img']['name'];
       $temp = $_FILES['img']['tmp_name'];
       $errors = [];

       $_SESSION['name']= $name      ;
       $_SESSION['password'] =$password;
       $_SESSION['email']  = $email  ;
       $_SESSION['address'] = $address  ;
       $_SESSION['linkedinUrl'] =  $linkedinUrl        ;
       $_SESSION['gender']  =  $gender   ;
        $_SESSION['img'] = $img_name  ;


       // validate name 
       if( empty($name)){
           $errors['name'] = 'field is required';
       }
       else{
        filter_var($name, FILTER_SANITIZE_STRING);
       
       }



       // validate email 
       if( empty($email) ){
        $errors['email'] = 'field is required';
       }
       elseif(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
        $errors['email'] = 'Invalid email address';
       }

       // validate password 
       if(empty($password)){
        $errors['password'] = 'field is required';
       }
       elseif(strlen($password) < 6){
        $errors['password'] = 'must be more than 6';
       }

       //validate address
       if(empty($address)){
        $errors['address'] = 'field is required';
       }
       elseif(strlen($address) < 10){
        $errors['address'] = 'must be 10 ';
       }

        //validate gender
        if(empty($gender)){
            $errors['gender'] = 'field is required';
           }

       //validate url
       if(empty($linkedinUrl)){
        $errors['linkedinUrl'] = 'field is required';
       }
       elseif(filter_var($linkedinUrl,FILTER_VALIDATE_URL)=== false){
        $errors['linkedinUrl'] = 'Invalid linkedinUrl';
       }

        //validate Profile image
        if(!empty($_FILES['image']['name'])){
          $extensions = array('jpg','png','jpeg');
          $ext = explode('.', $img_name);
         //    $ext = end($arr);
          //  $ext = pathinfo($img_name , PATHINFO_EXTENSION);
           $imgExtension = strtolower(end($ext));
            if(in_array($imgExtension, $extensions)){
              if($_FILES['img']['size'] < 2000000){
                $new_name = md5(uniqid()). '.' .$imgExtension;
                move_uploaded_file($temp, 'images/'.$new_name);
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
           foreach($errors as $key => $val){
              echo '* '.$key.' : '.$value.'<br>';
           }
           }else{
            echo "valid code";
       }
   }





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
 
 
 
  <form   action="profilePage.php"  method="post" enctype="multipart/form-data">
 
   <input type="hidden"   value="1" name="register">

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  name="name" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email"   class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword"> Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputaddress">address</label>
    <input type="text"   class="form-control" id="exampleInputaddress" name="address" placeholder="address">
  </div>

  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  name="gender" id="inlineRadio1" value="Male" >
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" >
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>


  <div class="form-group">
    <label for="exampleInputlinkedinUrl">Linkedin Url</label>
    <input type="url"   class="form-control" id="exampleInputlinkedinUrl" name="linkedinUrl" placeholder="linkedinUrl">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Profile image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>






</body>
</html> 