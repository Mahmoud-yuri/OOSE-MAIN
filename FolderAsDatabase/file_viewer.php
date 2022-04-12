<html>
<head>
<title>SIMPLE::CRUD [File Handling System]</title>
	<style type="text/css">
		body {padding: 20px;}
		input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
		td {padding: 4px; border: 1px #CCC solid; width: 100px;}
	</style>
</head>
<body>
<h4>SIMPLE::CRUD [File Handling System]</h4>
<b>Edit information</b>
<br>
<br>
<?php 
$get_filename = $_GET['filename'];

if($_POST['Submit']){

$open = fopen("name/$get_filename","w+");
$fullname_text = $_POST['fullname'];

$open_add = fopen("address/$get_filename","w+");
$address_text = $_POST['address'];


if(fwrite($open, $fullname_text) && fwrite($open_add, $address_text)) {
	echo "<script>window: location='index.php'</script>";
}

fclose($open);

}elseif($_POST['Cancel']) {
	echo "<script>window: location='index.php'</script>";
}
$fullname = file("name/$get_filename");

$address = file("address/$get_filename");
?>

<form action="file_viewer.php?filename=<?=$get_filename;?>" method="post">
	Fullname: <input type="text" name="fullname" value="<?php foreach($fullname as $fullname_text) { echo $fullname_text; } ?>">
	<br>
	Address: <input type="text" name="address" value="<?php foreach($address as $fullname_text) { echo $fullname_text; } ?>">
	<br><br>
	<input type="submit" name="Submit" value="Update" style="width: 70px;">
	<input type="submit" name="Cancel" value="Cancel" style="width: 70px;">
</form>
<hr>
</body>
</html>