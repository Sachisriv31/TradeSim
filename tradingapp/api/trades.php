<?php
include "../db.php";
$r=$conn->query("SELECT * FROM trades ORDER BY id DESC");
while($t=$r->fetch_assoc())
echo "{$t['side']} {$t['symbol']} {$t['quantity']} @ ₹{$t['price']}<br>";
