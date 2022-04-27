<?php
//echo ;
include_once "Function.php";
$obj=new record;
$obj->Ofmanager->fileN="product.txt";


$obj->delete_user($_GET["id"]);

header("location:prodppp.php");

?>