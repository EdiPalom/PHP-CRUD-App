<?php

include "database.php";

if(isset($_POST["id"]))
{
    $id = $_POST["id"];
    $query = "DELETE FROM contacts WHERE id = '$id'";
    $result = pg_query($db_conn,$query);

    if(!$result){
    die ("Error in database");
}

    echo "Contact deleted";
}

?>
