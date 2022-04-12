<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>
    <?php
    $id='';
$file = file ("fichier1.txt");
if (isset($_GET['edit_id']) and isset($_GET['p'])) {
    $id=$_GET['edit_id'];
    $n = $_GET['p'];
}
    
    $token = strtok($n, ":");
    if ($token !== false) {
       $t = trim($token);
       $token = strtok(":");
       $y = trim($token);
       $token = strtok(":");
       $e = trim($token);
       $token = strtok(":");
    }
?>
<center>
        <fieldset style="width:50%; height:25%;"><LEGend>Edit user</LEGend><br><br>

            <?php
            //variable declaration
$Name=$z=$Role_description=$tel="";
$nomErr=$mailErr=$telErr="";
$tab = array();

//valider the forms
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //valider Name
    if (empty($_POST['Name'])) {
        $nomErr = "Name is required";
    } else {
        $Name = test_input($_POST['Name']);
        if (!preg_match("/^[A-Za-z-' ]*$/", $Name)) {
            $nomErr = "It's not a Name";
        }
    }
    //valider Role_desc
    if (empty($_POST['Role_description'])) {
        $mailErr = "Role description is required";
    } else {
        $Role_description=test_input($_POST['Role_description']);
    }
    //valider ID
    if (empty($_POST['tel'])) {
        $telErr="ID is required";
    } else {
        $tel=test_input($_POST['tel']);
        if (!preg_match("/^[342][0-9]*$/", $tel)) {
            $telErr="It's not an ID";
        }
    }
   
    // $fp=fopen('fichier1.txt','w');
    
    // $z= "$Name : $Role_description : $tel";
    // $file[$id]=$z;
    // foreach ($file as $key => $value) {
    //     fputs($fp,$value);
    //     header("location: view.php");
    // }
    // fclose($fp);
    
    
}
function test_input($x)
{
    $x=trim($x);
    $x=stripslashes($x);
    $x=htmlspecialchars($x);
    return $x;
}
?>
            <form method="post" action="">
                <span>User type : <input type="text" name="Name" value="<?php echo $t; ?>"></span>
                <p class="error">*<?php echo $nomErr; ?></p><br><br>
                <span>Role Description : <input type="text" name="Role_description" value="<?php echo $y; ?>"></span>
                <p class="error">*<?php echo $mailErr; ?></p><br><br>
                <span>ID : <input type="tel" name="tel" minlength="8" maxlength="8"
                        value="<?php echo $e; ?>"></span>
                <p class="error">*<?php echo $telErr; ?></p><br>
                <input type="submit" name="submit" value="Edit" style="background-color:white;">
        </fieldset>
    </center>
</body>

</html>
<?php
if (($Name == $t) && ($Role_description == $y) && ($tel == $e)) {
    header("location: view.php");
}else{
    // validate the modification
    if (!$fp = fopen("fichier1.txt", "a")) {
        echo "Failed to open file";
    }
    //if the fields are empty, nothing will be modified
    elseif ((empty($_POST['Role_description']) || empty($_POST['Name']) || empty($_POST['tel'])) or ($mailErr || $nomErr || $telErr)) {
        fclose($fp);
    }
    //launch the modification after having rights
    else {
        $fp = fopen("fichier1.txt", "w");
        $z= "$Name : $Role_description : $tel\n";
        $file[$id]=$z;
        foreach ($file as $key => $value) {
            fputs($fp, $value);
            header("location: view.php");
        }
        fclose($fp);
    }
}
?>