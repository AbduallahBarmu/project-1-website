<?php
// this class to make functions to connection to the database
// and make require_once in initialize file for this class
// and call (db_connect) function inside initialize file

function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}

// this function to chek if have error in connection

function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

function db_disconnect($connection){
if(isset($connection)){
  $connection->close();
}
}




?>
