<html>
<head>
<title>SIMPLE::CRUD [File Handling System]</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
	jQuery.expr[':'].contains = function(a,i,m){
	    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase())>=0;
	};

	
	$(document).ready(function(){  
		
		$('input[name="search"]').keyup(function(){ 
		
			var searchterm = $(this).val();
			
			if(searchterm.length >2) {
				var match = $('tr.data-row:contains("' + searchterm + '")');
				var nomatch = $('tr.data-row:not(:contains("' + searchterm + '"))');				
				match.addClass('selected');
				nomatch.css("display", "none");
			} else {
				$('tr.data-row').css("display", "");
				$('tr.data-row').removeClass('selected');				
			}
			
		});

	});	
	</script>
	
	<style type="text/css">
body {padding: 20px;}
input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
td {padding: 4px; border: 1px #CCC solid; width: 100px;}
	
	</style>
</head>
<body>
<h4>SIMPLE::CRUD [File Handling System]</h4>
<b>Add information</b>
<br>
<br>
<?php
if(isset($_POST['submit'])) {
	
	
	
	//random filename
	$r_number = rand(1000000000, 0000);
	//get current date
	$date = date('Ymy');
	$filename = $date."_".$r_number;
	
	
	$data = $_POST['data'];
	$address = $_POST['address'];
	if(empty($data) && empty($address)) {
		echo "<font color='red'>All fields are required. Please check.</font>";
	}elseif(empty($data)) { 
		echo "<font color='red'>This field is required.</font>";
	}elseif(empty($address)) { 
		echo "<font color='red'>This field is required.</font>";
	}else {
		//path to save txt file
		$myFile = "name/files_$filename.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $data);	
		
		$myFile = "address/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $address);	
		fclose ($fh1);
	}
	
	
}
	

?>
<?php
	$get_filename = $_GET['filename'];
?>

<form action="index.php" method="post" enctype="multipart/form-data">
Fullname: <input type="text" name="data" placeholder="[Enter your name]">
<br>
Address: <input type="text" name="address" placeholder="[Enter your address]">
<br>
<br>
<button type="submit" name="submit">&nbsp;Save</button>
<button type="reset" name="submit">&nbsp;Clear</button>
</form>	
<hr>
<br>
Search:<input type="text" name="search" placeholder='[Search Here]'/>

<?php
		$path = 'name/'; // '.' for current
		echo "<br>";
		echo "<table id='my-table' border='2' style='border-collapse:collapse' style='border: 1px solid black;'>";
		echo "<tr class='data-header'> ";
		echo "<td><b>Name<b></td>";
		echo "<td><b>Address</b></td>";
		echo "<td colspan='2' width='1000px'><b>Actions</b></td>";
		echo "</tr>";
		foreach (new DirectoryIterator($path) as $file)
		{
			if($file->isDot()) continue;

			if($file->isFile())
			{
				echo "<tr class='data-row'>";
				echo "<td>".file_get_contents('name/'.$file)."</td><td>".file_get_contents('address/'.$file)."</td>
						<td> <a href='file_viewer.php?filename=$file'>Edit</a></td>";
				echo "<td width='80px'> <a href='delete_file.php?filename=$file'>Delete</a>";
				echo "</tr>";
			}
		}
		echo "</table>";
		
		$directory = 'name/';
		$files = glob($directory . '*.txt');

		if ( $files !== false )
		{
			$filecount = count( $files );
			echo "<br><b>Total Number of Records: </b>".$filecount;
		}
		else {
			echo 0;
		}

?>
<br>
<br>

<hr>
</body>
</html>