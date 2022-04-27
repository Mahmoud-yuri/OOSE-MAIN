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
    <table border=1>
        <tr>
            <td>id</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>User Type</td>
            
        </tr>
        <?php

        include_once "Function.php";
        session_start();
       // echo $_SESSION["Email"];
        $es = $_SESSION["Email"];
        $obj = new record;
        $obj->Ofmanager->fileN="users.txt";
        $arr = array();
        $arr = $obj->fin();

        $Eser = $obj->Esearch($es);


        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($Eser != 1) {
                if ($arr[$i]->type == $Eser+1) {
                    echo "<tr>" . "<td>" . $arr[$i]->id . "</td>" . "<td>" . $arr[$i]->user . "</td>" . "<td>" . $arr[$i]->Email . "</td>" . "<td>" . $arr[$i]->pass . "</td>" . "<td>" . $arr[$i]->type . "<td>" . "<a href =delete.php?id=" . $arr[$i]->id . ">delete</a>" . "</td>" . "</tr>";
                }
             } else {
                    echo "<tr>" . "<td>" . $arr[$i]->id . "</td>" . "<td>" . $arr[$i]->user . "</td>" . "<td>" . $arr[$i]->Email . "</td>" . "<td>" . $arr[$i]->pass . "</td>" . "<td>" . $arr[$i]->type . "<td>" . "<a href =delete.php?id=" . $arr[$i]->id . ">delete</a>" . "</td>" . "</tr>";
                }
            
        }
        //$obj->get_user_by_id(10);
        
        
        echo  "<td>" . "<a href='add form.php'>Add one</a>" . "</td>";
        
        echo  "<td>" . "<a href='p1.php'>Home</a>" . "</td>";
        echo "<td>". "<button onclick=window.print()>print table</button>"."</td>";
        // }
        // if($Eser==2)
        // {
        //     echo  "<td>" . "<a href='p1.php'>Add one</a>" . "</td>";
        
        //     echo  "<td>" . "<a href='ind2.html'>Back</a>" . "</td>";
        // }

        ?>
    </table>
</body>

</html>