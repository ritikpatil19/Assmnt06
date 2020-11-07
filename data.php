<?php

// include "dbconn.php";
require "dbconn.php";

if ($_POST['functionname'] != '') {

	switch ($_POST['functionname']) {
		case 'insertdata':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$cname = $_POST['cname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			// $stmt = $conn->prepare("SELECT phone FROM register WHERE phone=?");
			// $stmt->bind_param("s",$phone);
			// $stmt->execute();
			// $res = $stmt->get_result();
			// $r = $res->fetch_assoc();
			// $check = $r['phone'];
			// echo json_encode($check);
			// `id14770885_trip`.`register`(`fname`, `lname`, `cname`, `email`,`phone`, `date`)

			$sql = "INSERT INTO register VALUES ('$fname','$lname','$cname','$email','$phone', current_timestamp());";
			$data = mysqli_query($conn,$sql);
			if (!$data) {
				echo json_encode("User Already Registered...!!!");
			}
			else{
			    echo json_encode("Registered Successfully...!!!");
				exit;
			}
				
			$conn->close();
		break;

		default: echo json_decode("Invalid Data...!!!");
		break;
	}
}

?>

