<?php
$host = "us-cdbr-azure-southcentral-e.cloudapp.net";
$user = "b59e50473555e9";
$pwd = "26114531";
$db = "acsm_0e7ddff7b7d920f";
try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}
 ?>
