<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$total = 0;
$price=0;
$address = htmlspecialchars($_POST['address']);
$description =  htmlspecialchars($_POST['description']);
$payment_type = $_POST['payment_type'];
$total = $_POST['total'];
//echo "<pre>".print_r($_POST,1);die();
	$sql = "INSERT INTO orders (customer_id, payment_type, address, total, description) VALUES ($user_id, '$payment_type', '$address', $total, '$description')";
	if ($con->query($sql) === TRUE){
		$order_id =  $con->insert_id;
//
        $measurings = $_POST['measured'];

        foreach ($_POST as $key => $value)
		{
            $key = str_replace("new","",$key);
            $key = (int)$key;

			if(is_numeric($key)){


                $result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
			while($row = mysqli_fetch_array($result))
			{
				$price = $row['price'];

			}
				$price = $value*$price;

//                echo "<pre>".print_r(gettype($measurings),1);
//                echo "<pre>".print_r($price,1);
//
			$sql = "INSERT INTO order_details (order_id, item_id, quantity, price,measures) VALUES ($order_id, $key, $value, $price,'$measurings' )";
			$con->query($sql) === TRUE;		
			}
		}
		if($_POST['payment_type'] == 'Voucher'){
		$balance = $balance - $total;
		$sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
		$con->query($sql) === TRUE;
		}
			header("location: ../orders.php");
	}

?>