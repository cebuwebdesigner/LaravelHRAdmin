<?php






if($admin==2){

$dbhost = '127.0.0.1';

$dbuser = 'root'; 

$dbpass = '';

$dbname = 'olivergo_transhr';




$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);    
    

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

}



?>