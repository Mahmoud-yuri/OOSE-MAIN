<!-- 

 
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Message</title>
</head>
<body style = "background-color: #F0F7EE;">
	<!-- Add PHP block here -->
	<?php
		if(isset($_POST["submit"])){
			$Subject = stripslashes($_POST["subject"]);
			$Name = stripslashes($_POST["name"]);
			$Message = stripslashes($_POST["message"]);
			// Replace any '~' with '-' characters
			$Subject = str_replace("~", "-", $Subject);
			$Name = str_replace("~", "-", $Name);
			$Message = str_replace("~", "-", $Message);
			$MessageRecord = "$Subject~$Name~$Message\n";
			// Let's create a variable to store a new open file's data
			$MessageFile = fopen("MessageBoard/messages.txt", "ab");
			// Check that there are no issues with the file before writing the new message to it
			if($MessageFile === FALSE) {
				echo "There was an error in saving your message!\n";
			}
			else {
				fwrite($MessageFile, $MessageRecord);
				fclose($MessageFile);
				echo "Your message has been saved!\n";
			}
		} // end of main if() statement
	?>
	<h1 style="color: #776871; font-weight: bold; text-shadow: 1px 1px 1px #000000;">Post New Message</h1>
	<hr/>
	<br/>
	<form action="PostMessage.php" method="POST">
		<label style="font-weight: bold; color: #776871; font-size: 1.5em;  text-shadow: 1px 1px 1px #000000;">Subject:</label>
		<input style="background-color: #C4D7F2;" type="text" name="subject" />
		<label style="font-weight: bold; color: #776871; font-size: 1.5em; text-shadow: 1px 1px 1px #000000;">Name:</label>
		<input style="background-color: #C4D7F2;" type="text" name="name" />
		<br/>
		<br/>
		<textarea style="background-color: #C4D7F2;" name="message" rows="6" cols="80"></textarea>
		<br/>
		<br/>
		<input type="submit" name="submit" value="Post Message" />
		<input type="reset" name="reset" value="Reset Form" />
	</form>
	<br/>
	<hr/>
	<p><a href="MessageBoard.php">View Messages</a></p>
</body>
</html>
