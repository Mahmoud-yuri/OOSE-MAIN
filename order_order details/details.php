<?php

$order_id = isset($_GET['id'])?$_GET['id']:0;// The Parameter from the index.php page
if($order_id<=0){ 
	die("Invalid order"); 
}
$file = fopen("data.txt","r");

$order = false;// order identification 

// Pares the string and take the id: ===============
while(!feof($file)){
    $row = fgets($file);// Reading one line from the file
    $row_arr = explode("|",$row);
    $row_order_id = $row_arr[0];
    
    if($row_order_id==$order_id){ // row_order_id match with $order_id
        $order = $row_arr;
        break;
    }
    
} // End while loop

// ==================================================

if(!$order){ die("orders not found <a href=\"./\">Back to the order list</a>"); }
?>

<h3>Order data</h3>
<div>Order Name: <?php echo $order[1];?></div>
<div>Order Type: <?php echo $order[2];?></div>
<div>Order details: <?php echo $order[3];?></div>
<a href="update.php?id=<?php echo $order[0];?>">Edit</a>
<a onclick="return confirm('Are you sure to delete this order')" href="delete.php?del=<?php echo $order[0];?>">Delete</a>
<br><br>
<a href="./">Back to the order list</a>