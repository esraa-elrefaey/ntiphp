<?php

class Validator
{
    public function Clean($input)
    {
        return trim(strip_tags(stripslashes($input)));
    }

    public function Validate($input, $flag)
    {
        $status = true;

        switch ($flag) {
            case 1:
                # code...
                if (empty($input)) {
                    $status = false;
                }
                break;

            case 2:
                # code ....
                if (!preg_match("/^[a-zA-Z-' ]*$/",$input)) {
                    $status = false;
                }
                break;

            case 3:
                #code ....
                if (strlen($input) < 50) {
                    $status = false;
                }
                break;

            
            case 4: 
            # Code ....
            $allowedExt = ['png','jpg']; 
                 if(!in_array($input,$allowedExt)){
                    $status = false;
                 }
            break;
        }

        return $status;
    }
}

?>
