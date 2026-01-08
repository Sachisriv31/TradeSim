<?php
include "../db.php";
$r = $conn->query("SELECT * FROM instruments");
$data = [];
while($row = $r->fetch_assoc()) $data[] = $row;
echo json_encode($data);
