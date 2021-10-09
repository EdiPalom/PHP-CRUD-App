<?php

include "database.php";
include "utils.php";

if(isset($_POST["name"]))
{
    $user_data = array("name"=>$_POST["name"],"phone"=>$_POST["phone"],"email"=>$_POST["email"],"id"=>$_POST["id"],"edit"=>TRUE);

    $data = evaluate_data($user_data);

    $name = $data["name"];
    $phone = $data["phone"];
    $email = $data["email"];
    $id = $data["id"];

    if($data["name"])
    {
        $query = "UPDATE contacts SET fullname = '$name',phone = '$phone',email = '$email' WHERE id = '$id'";

        $response = pg_query($db_conn,$query);

        $message = array("error"=>FALSE,"message"=>"Contact edited");
        echo json_encode($message);        
    }else
    {
        $message = array("error"=>TRUE,"message"=>$data["error"]);
        echo json_encode($message);
    }
}

?>
