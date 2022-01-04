<?php


// TASK 2**
// Write a PHP function to print the next character of a specific character.
// input : 'a'
// Output : 'b'
// input : 'z'
// Output : 'a'








function nextChar($char){
  $res = ++$char ;
  

  
if(strlen ($res)> 1){
  $newres = $res[0] ; 
  echo $newres ;
}
else{
     echo $res . "<br>";
      }  
}
nextChar('a') ;
// input = a , output = b
nextChar('z') ;
// input = z , output = a 


?>







