<?php
session_start();

include_once "Function.php";



if (isset($_SESSION["Email"])) {

    $Orecord = new record;
    $Orecord->Ofmanager->fileN="users.txt";
    $es = $_SESSION["Email"];

    $Eser = $Orecord->Esearch($es);

   

    $Orecord->user = $_REQUEST["Username"];
    $Orecord->Email = $_REQUEST["Email"];
    $Orecord->pass = $_REQUEST["Password"];

    if ($Eser == 1) {
        $Orecord->type = $_REQUEST["type"];
    } else {
        $Orecord->type = $Eser + 1;
    }
    $Orecord->records();



    header("location:ppp.php");
} else {
    if ($_REQUEST["type"] == 1) {
        echo "your user type can be only 2 or 3 or 4";
        echo "<li><a href='add form.php'>back to sign up page</a></li>";
    } else {
        $Orecord = new record;
        $Orecord->Ofmanager->fileN="users.txt";
        $Orecord->user = $_REQUEST["Username"];
        $Orecord->Email = $_REQUEST["Email"];

        $Orecord->pass = $_REQUEST["Password"];

        $Orecord->type = $_REQUEST["type"];
        $Orecord->records();
        echo "user added";
        echo "<br>";
        echo "<li><a href=p1.php>back to main page</a></li>";
    }
}
