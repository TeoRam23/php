<?php
$con = mysqli_init(); mysqli_ssl_set($con,NULL,NULL, 
"DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
mysqli_real_connect($con, 
"teodor.mysql.database.azure.com", 
"teoram", 
"Passord123_XD", 
"beaker_db", 
3306, MYSQLI_CLIENT_SSL);

if ($con->connect_error) {
    die("wouh: " . $con->connect_error);
} else {
}



?>