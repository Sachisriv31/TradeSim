<?php
include "../db.php";
$r=$conn->query("SELECT * FROM orders ORDER BY id DESC");
while($o=$r->fetch_assoc())
echo "{$o['symbol']} {$o['side']} {$o['quantity']} @ ₹{$o['price']}<br>";
