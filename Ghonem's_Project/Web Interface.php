
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web inferface</title>
</head>
<body style="background-color: blue;">
<form action="??" method="??">
<u style="color:white">
<h1 style="font-family: 'Courier New', Courier, monospace; color:white; background-color:gray;">Login</h1>
</u>
<center>
<label style="font-family: 'Courier New', Courier, monospace; color:white">Email</label>
<input type="email" name="email" maxlength="150" placeholder="Enter your email" required>
<br><br>
<label style="font-family: 'Courier New', Courier, monospace; color:white">Role</label>
<input type="text" name="role" maxlength="150" placeholder="Enter your role" required>
<br><br>
<input type="submit" style="color: blue; font-size:medium">
<a href="NewUser.php">
<input type="button" value="Add User" style="color: blue; font-size:medium">
</a>
</center>
</form>
<?php 
    /*include_once "Submission.php";
    
    // Check old user 
    if (isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $role=$_POST['role'];
    }

    // Store new user information
    if (isset($_POST['Create User']))
    {
        echo "Please enter the following information";
        // to get the count +1 to the last count you have
        $role=$_POST['new_role'];
        $name=$_POST['person_name'];
        $tel=$_POST['Telephone'];
        $address=$_POST['address'];
        $postal_code=$_POST['postal_code'];
        $phone=$_POST['phone'];
        $email=$_POST['new_email'];
    }*/

?>
</body>
</html>