<?php
$file = fopen('test.txt' , 'r') or die ('unable to open file') ;

while(!feof($file)){

    ?>
    <div style= "background-color : gray ; margin : 50px ;padding:20px">
    <?php echo fgets($file) . "<br>"; ?>
    <button style= "background-color : red ; margin : 5px ;padding:2px">delete</button>
    </div>
    
   
 <?php
}


fclose($file) ;
?>
