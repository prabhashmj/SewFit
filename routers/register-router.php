<?php
include '../includes/connect.php';
$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];
//$photo = $_POST['NIC_photo'];
//echo '<pre>'.print_r($_FILES,1);die();
function number($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
    $file = addslashes(file_get_contents($_FILES["NIC_photo"]["tmp_name"]));
    $file2 = addslashes(file_get_contents($_FILES["NIC_photo2"]["tmp_name"]));

$sql = "INSERT INTO users (name, username, password, contact,nic_photo,nic_photo2) VALUES ('$name', '$username', '$password', $phone,'$file','$file2');";
if($con->query($sql)==true){
$user_id =  $con->insert_id;
$sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
if($con->query($sql)==true){
	$wallet_id =  $con->insert_id;
	$cc_number = number(16);
	$cvv_number = number(3);
	$sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
	$con->query($sql);
}
    if(mysqli_query($connect, $query))
    {
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}
//}
header("location: ../login.php");
?>


