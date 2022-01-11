function Clean($input){

$input =  trim($input);
$input =  strip_tags($input);
$input =  stripslashes($input);
return $input;


}

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