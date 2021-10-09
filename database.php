<?php

$db_conn = pg_connect("host=db port=5432 dbname=postgres user=postgres password=pass");

if(!$db_conn)
{
die("Error: failed database connection");
}

?>
