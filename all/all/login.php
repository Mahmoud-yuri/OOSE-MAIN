<?php
include_once "Function.php";
session_start();
$Email = $_REQUEST["Email"];
$pass = $_REQUEST["Password"];

$log = new record;
$log->Ofmanager->fileN="users.txt";
$condlog = $log->login($Email, $pass);
$_SESSION["Email"] = $Email;


$obj = new record;
$obj->Ofmanager->fileN="users.txt";
$who = $obj->inter($condlog);
if ($who != null) {
    $who->login();
    
} else {
    echo ("Your password or login is false");
}
?>


<?php
// include_once "Function.php";
// session_start();
// $Email=$_REQUEST["Email"];
// $pass=$_REQUEST["Password"];
// $log=new record;
// $condlog=$log->login($Email,$pass);
// if($condlog==TRUE)
// {
//     $_SESSION["Email"]=$Email;
//     echo("loggedin");
//     echo "<br>"."<a href='logout.php'>Log out</a>" ;
// }
// else{
//     echo("Your password or login is false");
// }
