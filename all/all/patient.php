<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patient</title>
</head>

<body>
    <h1>menu</h1>
    <?php
    $ct=1;
    $myfile = fopen("awal.txt", "r+") or die("not found");
    while (!feof($myfile)) 
    {
        $line = fgets($myfile);
        echo $line . "|";
        $ct++;
    }
    fclose($myfile);
    ?>

</html>