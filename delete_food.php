<?php
session_start();
include("db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM foods WHERE id='$id'");

echo "<script>alert('Food Deleted'); window.location='admin.php';</script>";
?>