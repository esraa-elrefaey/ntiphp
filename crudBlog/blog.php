<?php

// # TASK *** 7 *** .
// Build a Blog CRUD system using OOP 
// Title   =  [required , string]
// Content =  [required,length >50 ch]

// Image   =  [required, file].




session_start();
require 'dbConnection.php';
require 'Validate.php';

class Module
{
    private $title;
    private $content;
    private $image;

    // function __construct( )
    // {
  
    // }

    public function Blog($val1, $val2 , $val3 )
    {

        ## Create Obj From Validator  ......
        $validator = new Validator();
       
        # Clean ....
        $this->title     = $validator->Clean($val1);
        $this->content    = $validator->Clean($val2);
        $this->img = $validator->Clean($val3);

        # Validation .....
        $errors = [];

        # Validate Name ...
        if (!$validator->Validate($this->title, 1)) {
            $errors['title'] = 'Field Required';
        }elseif (!$validator->Validate($this->title, 2)) {
            $errors['title'] = 'Invalid title only string ';
        }

        # Validate Email
        if (!$validator->Validate($this->content, 1)) {
            $errors['content'] = 'Field Required';
        } elseif (!$validator->Validate($this->content, 3)) {
            $errors['content'] = 'must be  > 50 ch ';
        }

         # Validate Image
        if (!Validate($_FILES['image']['name'], 1)) {
            $errors['image'] = 'Field Required';
        } else {
            $ImgTempPath = $_FILES['image']['tmp_name'];
            $ImgName = $_FILES['image']['name'];

            $extArray = explode('.', $ImgName);
            $ImageExtension = strtolower(end($extArray));

            if (!Validate($ImageExtension, 4)) {
                $errors['image'] = 'Invalid Extension';
            } else {
                $FinalName = time() . rand() . '.' . $ImageExtension;
            }
        }

       # CHECK ERRORS ...   
        if (count($errors) > 0) {
            $Message = $errors;
        }else{
    
        
         
         # Create DB Obj ...
         $db = new DB();

       
        }
      
        $_SESSION['Message'] = $Message;


    // public function info(){
    //     echo ' .....';
    // }
          

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
 <label for="exampleFormControlFile1">Profile image</label>
 <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>






</body>
</html> 
