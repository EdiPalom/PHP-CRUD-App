<?php

$db_conn = pg_connect("host=ec2-54-208-96-16.compute-1.amazonaws.com port=5432 dbname=dc6sv2o6apil9t user=giisezugjbnkfk password=c975f93dc4011747f8469d287e476d6058f951435f460fdba76c49a54b7c7e96");
//$db_conn = pg_connect(getenv("DATABASE_URL"));

if(!$db_conn)
{
die("Error: failed database connection");
}

?>
