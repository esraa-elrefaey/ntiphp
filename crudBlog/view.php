<?php 
require 'blog.php';
        $user = new Module();

     $sql = "select * from blog";
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




           <a class="btn btn-info" href="blog.php"> BlogModule </a>
				<br>
				<br>
				<table class=" table table-bordered table-striped table-hover">
                <thead>
		 				<tr>
		 					<th>Title</th>
		 					<th>Content</th>
		 					<th>Profile image</th>
		 					<th>control</th>
		 				</tr>
		 			</thead>
		 			<tbody>
 				<?php
 	
           while($data = mysqli_fetch_assoc($result)){
 				 ?>
                  <tr>
                 <td><?php echo $data['title'];?></td>
                 <td><?php echo $data['content'];?></td>
                 <td><?php echo $data['uplode'] ;?></td>
                 <td>
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a><br><br>
                 <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>           
                </td> 
           </tr> 
            <?php } ?>
		 		
		</tbody>
		</table>

 </body>
</html> 
