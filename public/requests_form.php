<?php

include "database.php";
include "utils.php";

if(isset($_POST["name"]))
{
    $user_data = array("name"=>$_POST["name"],"phone"=>$_POST["phone"],"email"=>$_POST["email"],"edit"=>FALSE);
    $data = evaluate_data($user_data);

    $name = $data["name"];
    $phone = $data["phone"];
    $email = $data["email"];
    
    if($data["name"])
    {
        $query = "insert into contacts(fullname,phone,email) values('$name','$phone','$email')";
        $response = pg_query($db_conn,$query);

        if(!$response){
            die("Database error");        
        }

        $message = array("error"=>FALSE,"message"=>"Contact added successfully");
        echo json_encode($message);
    }else
    {
        $message = array("error"=>TRUE,"message"=>$data["error"]);
        echo json_encode($message);
    }
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $query = "select * from contacts";
    $response = pg_query($db_conn,$query);

    if(!$response){
        die("Database error");
    }


    $json = array();
    
    while($row = pg_fetch_row($response)){

        $json[] = array(
            'name' => $row[1],
            'phone' => $row[2],
            'email' => $row[3],
            'id' => $row[0],
        );
    }

    $json_string = json_encode($json);
    echo $json_string;
}

?>
