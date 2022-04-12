<?php
	$order_id = $_GET['del'];
	
	$orders = file('data.txt');
	foreach($orders as $order){
    $order_parsed = explode("|",$order); // Parsing the string
    
    // Extraction of order information:
    $row_order_id = $order_parsed[0];
    $ordername = $order_parsed[1];
    $order_type = $order_parsed[2];
    $order_details = $order_parsed[3];

    if($row_order_id==$order_id){ // row_order_id match with $order_id
        $order_string = "{$row_order_id}|{$ordername}|{$order_type}|{$order_details}";	
    	$content = str_replace($order_string, '', $orders);
		file_put_contents('data.txt', $content);
		
		header("location: index.php");
    }

}