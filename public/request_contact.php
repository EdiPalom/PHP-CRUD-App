<?php

include "database.php";

if(isset($_POST["id"]))
{
    $id = $_POST["id"];
    $query = "SELECT * FROM contacts WHERE id = '$id'";
    $response = pg_query($db_conn,$query);

    if(!$response)
    {
        die("Error in query");
    }

    $data = pg_fetch_array($response);

    $contact = array("name"=>$data["fullname"],"phone"=>$data["phone"],"email"=>$data["email"],"id"=>$data["id"]);

    echo json_encode($contact);

}

?>
