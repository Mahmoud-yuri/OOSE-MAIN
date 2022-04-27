<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web inferface</title>
</head>
<body style="background-color: blue;">
    <form action="" method="POST">
    <u style="color:white">
<h1 style="font-family: 'Courier New', Courier, monospace; color:white; background-color:gray;">New User Information</h1>
</u>
<center>
    <td>   
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Role</label>
    <input type="text" name="new_role" maxlength="15" placeholder="Enter your role" required>
    </tr> 
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Name</label>
    <input type="text" name="person_name" maxlength="150" placeholder="Enter your name" required>
    </tr>
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Telephone</label>
    <input type="number" name="Telephone" maxlength="8" placeholder="Enter your telephone" required>
    </tr>
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Address</label>
    <input type="text" name="address" maxlength="10" placeholder="Enter your address" required>
    </tr>
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Postal code</label>
    <input type="number" name="postal_code" maxlength="5" placeholder="Enter your postal code" required>
    </tr>
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Phone</label>
    <input type="number" name="phone" maxlength="11" placeholder="Enter your phone" required>
    </tr>
    <br><br>
    <tr>
    <label style="font-family: 'Courier New', Courier, monospace; color:white">Email</label>
    <input type="email" name="new_email" maxlength="150" placeholder="Enter your email" required>
    </tr>
    </td>
    <br><br>
    <input type="button" value="Create" style="color: blue; font-size:medium">
    </center>
    </form>
    <?php 
    
    if ($role=$_POST['new_role']!="")
    {
       $record0=$role;
    }

    if ($name=$_POST['person_name']!="")
    {
       $record1=$name;
    }

    if ($telephone=$_POST['Telephone']!="")
    {
       $record2=$telephone;
    }

    if ($address=$_POST['address']!="")
    {
       $record3=$address;
    }

    if ($postal_code=$_POST['postal_code']!="")
    {
       $record4=$postal_code;
    }
    
    if ($phone=$_POST['phone']!="")
    {
       $record5=$phone;
    }

    if ($new_email=$_POST['new_email']!="")
    {
       $record6=$new_email;
    }

    StoreRecord ("User.txt",$record0,$record1,$record2,$record3,$record4,$record5,$record6);
    
    ?>
</body>
</html>