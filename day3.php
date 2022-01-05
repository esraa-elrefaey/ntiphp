
<?php 

// *** task 3 ***

// Create a form with the following inputs (name, email, password, address,, linkedin url) Validate inputs then return message to user . 
// * validation rules ... 
// name  = [required , string]
// email = [required,email]
// password = [required,min = 6]
// address = [required,length = 10 chars]
// linkedin url = [reuired | url]
// * Don't use Filters or regular expressions .



if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $address = $_POST['address'];
       $linkedinUrl = $_POST['linkedinUrl'];
       $check=[a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,_]
       $errors = [];



       // validate name 
       if( empty($name) ){
           $errors['name'] = 'field is required';
       }
       foreach ($check as $value) {
        if($name[0] != $value){
        $errors['name'] = 'must be string';
       }
         }



       // validate email 
       if( empty($email) ){
        $errors['email'] = 'field is required';
       }
       elseif(strpos($email ,'@' ) ===  0){
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
       elseif(strlen($address) > 10){
        $errors['address'] = 'must be 10 ';
       }

       //validate url
       if(empty($linkedinUrl)){
        $errors['linkedinUrl'] = 'field is required';
       }
       elseif(strpos($linkedinUrl ,'http://') === 0 || strpos($linkedinUrl, 'https://') === 0){
        $errors['linkedinUrl'] = 'Invalid linkedinUrl';
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
 
 
 
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="post">
 
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

  <div class="form-group">
    <label for="exampleInputlinkedinUrl">Linkedin Url</label>
    <input type="text"   class="form-control" id="exampleInputlinkedinUrl" name="linkedinUrl" placeholder="linkedinUrl">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>






</body>
</html> 