<?php
// allowed_types=array(
// "image/jpeg",
// "image/gif",
// "image/png",
// "text/plain",
// "application/msword",
// "application/vnd.ms-excel");

    // if(isset($_FILES["filevalue"]["type"]))
    // {
    // if(! in_array($_FILES["filevalue"]["type"] , $allowed_types))
    // {
    // die("You need to upload word/excel/plain text/ images only");
    // }
    // }	
	
	
?>
<?php
if (isset($_POST['upload'])){

//image
	$allowed_ext = array("text/plain");
	
	 if(isset($_FILES["file"]["type"])) {
		if(! in_array($_FILES["file"]["type"] , $allowed_ext)) { 
			die("You need to upload word/excel/plain text/ images only");
		} else {
			$file= addslashes(file_get_contents($_FILES['file']['tmp_name']));
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"files/" . $_FILES["file"]["name"])) {
				echo "Success uploading new file.";
			}
			
		}
    }	
	
			
}
?>	