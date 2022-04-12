<?php 
	
	if($_POST['retrieve'] == "1") {
		if(isset($_POST['fileName'])) { die(file_get_contents($_POST['fileName'])); }
	}

	else if($_POST['save'] == "1") {
		
		if($_POST['content'] == "") { $_POST['content'] = "\0"; }
	 
		if($file = fopen($_POST['fileName'],"w")) {
		
			if(fwrite($file,$_POST['content'])) {
			 
				fclose($file);
				
				die(json_encode(["desc"=>"Stored.","level"=>"success"]));
				
			} else { die(json_encode(["desc"=>"Error writing to file","level"=>"fatal"])); } 
			
		} else { die(json_encode(["desc"=>"The file could not be opened","level"=>"fatal"])); }
		
	}
	
	else {
		if(!isset($_GET['fileName'])) { die("There is no file selected, make sure you are sending it as url parameter ?fileName=filename.txt"); }
		if(!file_exists($_GET['fileName'])) { die("File not found."); }
	}
	
?>
<html>
	<head>
	
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src = 'https://cdn.jsdelivr.net/npm/taboverride@4.0.3/build/output/taboverride.min.js'></script>
		<meta charset = 'UTF-8'>
		
		<style> a:link,a:visited,button{color:powderblue;text-decoration:none;background:none;}a:hover,button{text-decoration:underline;background:none;}body{font-family:'lucida grande','Segoe UI',Arial, sans-serif;background:black;color:white;}input[type=button]{font-size:16px;font-family:'lucida grande','Segoe UI',Arial, sans-serif;background:none;border:0px;text-decoration:none;color:powderblue;}input[type=button]:hover{text-decoration:underline;cursor:pointer;}#editor{overflow-x:scroll;background:rgb(20,20,20);color:rgb(248,248,248);font-family:courier;width:100%;height:85%;font-size:13px;padding:24px;tab-size:2em;-moz-tab-size:2em;-o-tab-size:2em;white-space:pre;}#menubar{padding:.75em;}</style> 
		
		<script>
		
			function postAjax(url, data, success) {var params = typeof data == 'string' ? data : Object.keys(data).map(function(k){return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])}).join('&');var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");xhr.open('POST', url);xhr.onreadystatechange = function() {if(xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }};xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');xhr.send(params);return xhr;}
			var $_GET = {}; if(document.location.toString().indexOf('?') !== -1) { var query = document.location.toString().replace(/^.*?\?/, '').replace(/#.*$/, '').split('&'); for(var i=0, l=query.length; i<l; i++) { var aux = decodeURIComponent(query[i]).split('='); $_GET[aux[0]] = aux[1]; } }
			
			var fileName = $_GET['fileName']; 		
		
			function doSave() {
				postAjax("?",{"save":"1","fileName":fileName,"content":document.getElementById('editor').value},function(data) {
					
					try { data = JSON.parse(data); } 
					catch(e) { console.log(data); data = {desc:'An unknown error occurred.'}; }
					
						document.getElementById('saveStatus').innerHTML = ' - ' + data.desc;
						
						window.setTimeout(function(){
							$('#saveStatus').fadeOut(
								function() {
									document.getElementById('saveStatus').innerHTML = ''; 
									document.getElementById('saveStatus').style['display']='inline';
								}
							);
						},3000);
					
				});
			}
			
			$(document).keydown(function(e) {if((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey)){ e.preventDefault(); doSave(); }}); 
		</script>
	</head>
	
	<body>
	
		<div id = 'menubar'>
			File: <a href = '#' target = '_BLANK' id = 'fileLink'></a>
			 | 
			<input type = 'button' onclick = 'doSave();' value = 'To_stock' style = 'padding:0px;'>
			 / 
			<a href = 'index.php'>Go_back</a>
			  
			<i id = 'saveStatus'></i>
		</div>
		
		<textarea active name = 'newContent' id = 'editor'></textarea>
		<script>tabOverride.set(document.getElementById('editor'));</script>
		
		<script>
		
			document.getElementById("fileLink").innerHTML = fileName;
			document.getElementById("fileLink").href = fileName;
			
			document.title = "toitText -- Editing: '" + fileName + "'.";
			
			postAjax("?",{"retrieve":"1","fileName":fileName},function(data) {
				document.getElementById("editor").innerHTML = data;
			});
			
		</script>
			
		<div>
			
		</div>
	</body>
</html>
