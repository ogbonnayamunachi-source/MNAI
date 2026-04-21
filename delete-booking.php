<?php
$conn = new mysqli("localhost", "root", "", "munachi_ai");

$id = $_GET['id'];

$conn->query("DELETE FROM bookings WHERE id=$id");

header("Location: admin-bookings.php");
exit();
?>