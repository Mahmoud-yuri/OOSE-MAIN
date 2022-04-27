<?php
//echo ;
include_once "Function.php";
$obj=new record;
$obj->Ofmanager->fileN="users.txt";
if($_GET["id"]!=1)
{
$obj->delete_user($_GET["id"]);
}
header("location:ppp.php");

?>