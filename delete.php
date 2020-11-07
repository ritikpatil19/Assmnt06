<?php

include "dbconn.php"; // Using database connection file here

$phone = $_GET['phone']; // get id through query string

$del = $conn->prepare("delete from register where phone = '$phone'"); // delete query
$del->execute();
if($del)
{
    mysqli_close($conn); // Close connection
    header("location:index.html"); // redirects to show page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>