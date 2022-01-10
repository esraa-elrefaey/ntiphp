<?php
$file = fopen('test.txt' , 'r') or die ('unable to open file') ;

while(! feof($file)){

    ?>
    <div style= "background-color : red ; margin : 50px ;">
    <?php echo fgets($file) . "<br>"; ?>
    <button>delete</button>
    </div>
    
   
 <?php
}


fclose($file) ;
?>