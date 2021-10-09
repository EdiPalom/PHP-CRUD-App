<?php

function filter_name($name)
{
    $name = filter_var(trim($name),FILTER_SANITIZE_STRING);

    if(filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]+\s[a-zA-Z]+$/")))){
        return $name;
    }else
    {
        return FALSE;
    }
}

function filter_email($email)
{
    $email = filter_var(trim($email),FILTER_SANITIZE_EMAIL);
    
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return $email;
    }else
    {
        return FALSE;
    }
}

function filter_phone($number)
{
    $number = filter_var(trim($number),FILTER_SANITIZE_STRING);
    if(filter_var($number,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[0-9]+$/"))))
    {
        return $number;
    }else
    {
        return FALSE;
    }
}



function evaluate_data($data)
{
    $message_error = "";
    
    $name = $data["name"];
    $phone = $data["phone"];
    $email = $data["email"];
    $id = "";
    
    $message_error = (empty($name)) ? "Please enter your name" : $message_error;
    $message_error = (empty($phone)) ? "Please enter your phone number" : $message_error;
    $message_error = (empty($email)) ? "Please enter your email" : $message_error;

    if($data["edit"])
    {
        $message_error = (empty($data["id"])) ? "Request Invalid" : $message_error;
        $id = $data["id"];
    }

    if(empty($message_error))
    {
        $name = filter_name($name);
        $phone = filter_phone($phone);
        $email = filter_email($email);

        $message_error = ($name == FALSE) ? "Please enter a valid name" : $message_error;
        $message_error = ($phone == FALSE) ? "Please enter a valid phone number" : $message_error;
        $message_error = ($email == FALSE) ? "Please enter a valid email": $message_error;
    }

    if(empty($message_error))
    {
        return array("name"=>$name,"phone"=>$phone,"email"=>$email,"id"=>$id,"error"=>False);
    }else
    {
        return array("name"=>"","phone"=>"","email"=>"","id"=>"","error"=>$message_error);
    }
}

?>
