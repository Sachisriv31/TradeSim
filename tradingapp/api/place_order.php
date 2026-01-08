<?php
include "../db.php";

$s = $_POST['symbol'];
$side = $_POST['side'];
$q = (int)$_POST['quantity'];

$p = $conn->query("SELECT price FROM instruments WHERE symbol='$s'")
          ->fetch_assoc()['price'];

$conn->query("INSERT INTO orders VALUES (NULL,'$s','$side','MARKET',$q,$p,'EXECUTED',NOW())");
$conn->query("INSERT INTO trades VALUES (NULL,'$s','$side',$q,$p,NOW())");

$conn->query("INSERT INTO portfolio VALUES ('$s',$q,$p)
ON DUPLICATE KEY UPDATE quantity=quantity+$q");

echo "Order Executed";
