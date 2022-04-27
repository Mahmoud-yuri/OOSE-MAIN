<?php
session_start();
include_once "Function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <table border="3">

        <form action="add.php">
            <div>
                <tr>
                    <div>
                        <td> <label for="Username">Enter Username</label></td>
                        <td> <input type="text" placeholder="Username" id="Username" name="Username"></td>
                    </div>
                </tr>
                <tr>
                    <div>
                        <td> <label for="Email">Enter Email</label></td>
                        <td> <input type="email" placeholder="Email" id="Email" name="Email"></td>
                    </div>
                </tr>
                <tr>
                    <div>
                        <td><label for="Password">Enter Password</label></td>
                        <td> <input type="password" placeholder="Password" id="Password" name="Password"></td>
                    </div>
                </tr>
                <?php
                if (isset($_SESSION["Email"])) {
                    $es = $_SESSION["Email"];
                    $Orecord = new record;
                    $Orecord->Ofmanager->fileN="users.txt";
                    $Eser = $Orecord->Esearch($es);
                    if ($Eser == 1) {
                        echo
                        "
                <tr>
                    <div>
                        <td> <label for=type>Enter type</label></td>
                        <td> <input type=text placeholder=type id=type name=type></td>
                    </div>
                </tr>";
                    }
                }
                else{
                    echo
                    "
            <tr>
                <div>
                    <td> <label for=type>Enter type</label></td>
                    <td> <input type=text placeholder=type id=type name=type></td>
                </div>
            </tr>";
                }
                ?>
            </div>
            <div>
                <tr>
                    <td> <button>Add</button></td>
                </tr>
            </div>

        </form>
    </table>
</body>

</html>