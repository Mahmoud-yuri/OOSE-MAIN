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
            <td>product name</td>
            <td>product details</td>
            <td>product img</td>
            <td>Product Type</td>

        </tr>
        <?php

        include_once "Function.php";
        session_start();
        //echo $_SESSION["Email"];
        $es = $_SESSION["Email"];
        $obj = new record;
        $obj->Ofmanager->fileN = "product.txt";
        $arr = array();
        $arr = $obj->fin();

        $obj2 = new record;
        $obj2->Ofmanager->fileN = "users.txt";
        $Eser = $obj2->Esearch($es);



        for ($i = 0; $i < count($arr) - 1; $i++) {

            echo "<tr>" . "<td>" . $arr[$i]->id . "</td>" . "<td>" . $arr[$i]->user . "</td>" . "<td>" . $arr[$i]->Email . "</td>" . "<td>" . $arr[$i]->pass . "</td>" . "<td>" . $arr[$i]->type;
           
            if ($Eser == 4) {
                echo "<td>" . "<a href =prodr.php?id=" . $arr[$i]->id . ">Request</a>" . "</td>";
            } else {
                echo "<td>" . "<a href =deleteprod.php?id=" . $arr[$i]->id . ">delete</a>" . "</td>";
            }
            echo  "</tr>";
        }
        //$obj->get_user_by_id(10);


        echo  "<td>" . "<a href='addprod.html'>Add one</a>" . "</td>";

        echo  "<td>" . "<a href='p1.php'>Home</a>" . "</td>";

        echo "<td>" . "<button onclick=window.print()>print table</button>" . "</td>";

        echo  "<td>" . "<a href='ind2.php'>Upload product img</a>" . "</td>";
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