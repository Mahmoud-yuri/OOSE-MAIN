<?php

if(isset($_POST['btn_submit'])){
    
    $all_orders = file("data.txt");
    $last_order = $all_orders[sizeof($all_orders)-1]; // Taking the last member of the series
    $order = explode("|", $last_order);

    // Structure for the new order:
    $new_order = ($order[0]+1)."|".$_POST['tb_ordername']."|".$_POST['tb_order_type']."|".$_POST['tb_order_details']."\n";

    file_put_contents("data.txt", $new_order, FILE_APPEND); // Adding orders to a new line
    
    header("Location: index.php");
}
?>

<form action="" method="post">
    Order name: <input type="text" name="tb_ordername" value="" /><br>
    Order type: <input type="text" name="tb_order_type" value="" /><br>
    order details: <input type="text" name="tb_order_details" value="" /><br>
    <input type="submit" name="btn_submit" value="confirm changes" /><br>
</form>

<a href="index.php">Back to the order list</a><br>