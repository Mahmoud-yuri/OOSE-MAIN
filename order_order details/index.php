
<?php

$all_orders = file("data.txt");// Working with data.txt file
foreach($all_orders as $order){// Pass throught the loop orders
    
    $order_parsed = explode("|",$order); // Parsing the string
    
    // Extraction of order information:
    $order_id = $order_parsed[0];
    $ordername = $order_parsed[1];
    $order_type = $order_parsed[2];
    
    // Print order information on the page:
    echo"<a href='details.php?id={$order_id}'><div style ='border:1px solid black; padding:4px;margin:4px;'>";
    echo'Order name: '.$ordername;
    echo'<br>Order Type: ' .$order_type;
    echo'</div></a>';
}
?>

<a href="add.php">Add new order</a>