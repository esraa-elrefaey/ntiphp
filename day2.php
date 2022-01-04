<?php


// TASK 2**
// Write a PHP function to print the next character of a specific character.
// input : 'a'
// Output : 'b'
// input : 'z'
// Output : 'a'








function nextChar($char){
  $result = ++$char ;
  
// if we have a result will be b
// if we have z result will be a 
  
if(strlen ($result)> 1){
  $newresult = $result[0] ; 
  echo $newresult ;
}
else{
     echo $result . "<br>";
      }  
}
nextChar('a') ;
// input = a , output = b
nextChar('z') ;
// input = z , output = a 


?>







