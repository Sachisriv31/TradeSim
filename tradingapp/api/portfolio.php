<?php
include "../db.php";
$r=$conn->query("SELECT * FROM portfolio");
while($p=$r->fetch_assoc())
echo "{$p['symbol']} Qty:{$p['quantity']} Avg:₹{$p['avg_price']}<br>";
