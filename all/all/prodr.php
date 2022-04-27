<?php
//echo ;
session_start();
include_once "Function.php";
// $obj=new record;
// $obj->Ofmanager->fileN="users.txt";

// $es = $_SESSION["Email"];
// $id=$obj->Esearchid($es);
$obj2=new record;
$obj2->Ofmanager->fileN="product.txt";

//$all=[];
$arr=$obj2->req($_GET["id"]);
$line=[];
$line=$obj2->req2($_GET["id"]);
$arrline = explode("~", $line);

//echo $arr;
//echo $_GET["id"];

echo "<img src='$arr'>"."<br>product id:".$arrline[0]."<br>"."<br>product name:".$arrline[1]."<br>"."<br>product details:".$arrline[2]."<br>"."<br>product type:".$arrline[4];
echo "<br>";

?>
<br>
<button onclick="window.print()">print</button>
<?php
echo "<a href=prodppp.php>Go back</a>";
?>