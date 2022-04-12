<a href="index.php">Return to order list</a><br>

<?php
// If the form is sent, parsing order data and then put that data in the string:
if(isset($_POST['btn_submit'])){
    $orders_list = file("data.txt");
    $search_id = $_POST['hf_id'];

    $has_changes = false;

    foreach($orders_list as &$usr){// Pass through the array

        $order_row = explode("|", $usr);// Parsing orders data
        // Make the string:
        if($search_id == $order_row[0]){
            $tb_order_name = $_POST['tb_ordername'];
            $tb_last_name = $_POST['tb_order_tyoe'];
            $tb_order_details = $_POST['tb_order_details'];
            // Data form put into a new file:
            $order_string = "{$search_id}|{$tb_order_name}|{$tb_last_name}|{$tb_order_details}";
            $usr = $order_string."\n";// Go through a string and record a file

            $has_changes = true; // if has been a change, the value is true

            break;
        }
    }// End foreach loop 
    
    // recording data into a file:
    if($has_changes){
       $file = fopen("data.txt","w");
       foreach($orders_list as $usr1){
           fputs($file, $usr1);//."\n"
       }

       fclose($file);
       header("location: index.php");
    }// End if has_changes
}// End main if 



// Read data from file:
$order_id = isset($_GET['id'])?$_GET['id']:0;
if($order_id<=0){
    die("Invalid order");
}

$file = fopen("data.txt","r");
$order = false;

while(!feof($file)){
    $row = fgets($file);
    $row_arr = explode("|",$row);
    
    $row_order_id = $row_arr[0];
    
    if($row_order_id==$order_id){
        $order = $row_arr;
        break;
    }
    
}// End of while loop

if(!$order){ die("order not found"); } ?>

<form action="" method="post">

<input type="hidden" name="hf_id" value="<?php echo $order[0]; ?>" /><br>
    Order name: <input type="text" name="tb_ordername" value="<?php echo $order[1]; ?>" /><br>
    Order type: <input type="text" name="tb_order_tyoe" value="<?php echo $order[2]; ?>" /><br>
    order details: <input type="text" name="tb_order_details" value="<?php echo $order[3]; ?>" /><br>
    <input type="submit" name="btn_submit" value="confirm changes" /><br>
</form>