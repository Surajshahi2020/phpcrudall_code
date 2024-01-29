<?php
$conn = new mysqli("localhost", "root", "", "crud");
echo $conn->connect_error ? "Connection failed: " . $conn->connect_error : "Connection successfully<br><br>";
?>