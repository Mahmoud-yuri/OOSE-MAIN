<?php

//  $ct=0;
//  $myfile = fopen("users.txt", "r+");
//  while (!feof($myfile)) 
//  {
//      $line = fgets($myfile);
//      $ct++;
//  }
//  fclose($myfile);
// echo "your user have been added"."\r" ."<a href=login.html>Go back</a>";

 include_once "Function.php";
 

//$user=$_REQUEST["Username"];
//$pass=$_REQUEST["Password"];
//$id=$_REQUEST["id"];
//$type=$_REQUEST["type"];
//$Oct = new record;

//$ct1=$oct->lastnum()+1;
$Orecord=new record;
$Orecord->Ofmanager->fileN="product.txt";
$Orecord->user=$_REQUEST["productname"];
$Orecord->Email=$_REQUEST["productdetails"];
$Orecord->pass=$_REQUEST["productimage"];
$Orecord->type = $_REQUEST["type"];
$Orecord->Orecords();


//$rec=$ct1."~".$user."~".md5($pass)."~".$type;
//$oct->saveinfile($rec);
header("location:prodppp.php");
?>
