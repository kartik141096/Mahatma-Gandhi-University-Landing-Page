<?php

if($_SERVER['SERVER_NAME'] == 'www.mgu.edu.in' || $_SERVER['SERVER_NAME'] == 'mgu.edu.in' || $_SERVER['SERVER_NAME'] == '13.127.91.175'){

  # Server DB
  $servername = "localhost";
  $username = "root";
  $password = "redhat";
  $dbname = "MGU";

}else{

  # Local DB
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "landing_page";
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


require_once('./encryption.php');

$sql = "INSERT INTO landing_page (`name`, `phone`, `email`)
VALUES ('".sanitize($_POST['name'])."', '".sanitize($_POST['phone'])."', '".sanitize($_POST['email'])."')";

if ($conn->query($sql) === TRUE) {
    
    header('Location: https://www.mgu.edu.in/admission/thankyou.php');
    
} else {
    
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?>