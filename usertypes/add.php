<!DOCTYPE html>
<html>

<head>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
    <script langage="javaScript">
    function reinit() {
        window.location.href = 'add.php';
    }
    </script>
</head>

<body>
    <center>
        <fieldset style="width:50%; height:25%;"><legend>Add a user type</legend><br><br>

            <?php
$Name=$Role_description=$tel="";
$nomErr=$mailErr=$telErr="";
$err="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //valider Name
    if (empty($_POST['Name'])) {
        $nomErr = "User type is required";
    } else {
        $Name = test_input($_POST['Name']);
        if (!preg_match("/^[A-Za-z-' ]*$/", $Name)) {
            $nomErr = "It's not a user type";
        }
    }//valider Role_desc
    if (empty($_POST['Role_description'])) {
        $mailErr = "Role description is required";
    } else {
        $Role_description=test_input($_POST['Role_description']);
    }//valider ID
    if (empty($_POST['tel'])) {
        $telErr="Number is required";
    } else {
        $tel=test_input($_POST['tel']);
        if (!preg_match("/^[342+][0-9]*$/", $tel)) {
            $telErr="It's not a number";
        }
    }
    
}
function test_input($x)
{
    $x=trim($x);
    $x=stripslashes($x);
    $x=htmlspecialchars($x);
    return $x;
}
?>
            
<?php
/////////////////////////////////////////////////
$file = file("fichier1.txt");
$contents = file_get_contents("fichier1.txt");
$pattern = preg_quote($Role_description, '/');
$pattern = "/^.*$Role_description.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
    $tab = implode("\n", $matches[0]);
    // $file = file("fichier1.txt");
    $token = strtok($tab, ":");
    if ($token !== false) {
        $t = trim($token);
        $token = strtok(":");
        $y = trim($token);
        $token = strtok(":");
        $e = trim($token);
        $token = strtok(":");
      }
}else $y="";
$cont = file_get_contents("fichier1.txt");
$pat = preg_quote($tel, '/');
$pat = "/^.*$tel.*\$/m";
if (preg_match_all($pat, $cont, $matche)) {
    $g = implode("\n", $matche[0]);
    // $file = file("fichier1.txt");
    $tok = strtok($g, ":");
    if ($tok !== false) {
        $tt = trim($tok);
        $tok = strtok(":");
        $yy = trim($tok);
        $tok = strtok(":");
        $ee = trim($tok);
        $tok = strtok(":");
    }
}
//////////////////////////////////////////////////////////////////////////////
if (!$fp = fopen("fichier1.txt", "a")) {
    echo "Failed to open file";
} 
//if the variables are empty then close the file
elseif ((empty($_POST['Role_description']) || empty($_POST['Name']) || empty($_POST['tel'])) or ($mailErr || $nomErr || $telErr)) {
    fclose($fp);
} 
//if not do this
else {
    if (!empty($y) || !empty($ee)) {

    if (($y == $Role_description) || ($ee == $tel)) {
        $err = ($y == $Role_description) ? "the role description already exists" : "the ID already exists";
        fclose($fp);
    }
    }
    else{
        fputs($fp, "\n"); // we go to the line
        fputs($fp, $Name." : ".$Role_description." : ".$tel); // write the name and email in the file
        
    echo "<script>alert('Text added');</script>";
        fclose($fp);
    }
    
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <span>User type : <input type="text" name="Name" value="<?php echo $Name; ?>"></span>
                <p class="error">*<?php echo $nomErr; ?></p><br><br>
                <span>Role Description : <input type="text" name="Role_description" value="<?php echo $Role_description; ?>"></span>
                <p class="error">*<?php echo $mailErr; ?></p><br><br>
                <span>ID: <input type="tel" name="tel" minlength="8" maxlength="8"
                        value="<?php echo $tel; ?>"></span>
                <p class="error">*<?php echo $telErr; ?></p><br><BR><span class="error"><?php echo $err; ?></span><br>
                <input type="submit" name="submit" value="Insert" style="background-color:white;">
                <input type="button" name="reset" value="empty the fields" Onclick="reinit()" />
            </form><br><br>
            <a href="view.php">View Users</a>
        </fieldset><br><br>
        <fieldset style="width:50%; height:25%;"><legend>search for a user type</legend><br><br>
            <form method="post" action="serch.php">
                <label>search : </label> <input type="text" name="serch" pattern="^([0-9]{8})|([A-Za-z0-9._%\+\-]+@[a-z0-9.\-]+\.[a-z]{2,3})$">
                <input type="submit" value="search">
            </form>
        </fieldset>
    </center>
</body>

</html>