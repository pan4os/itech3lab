<?php

header('Content-Type: application/json');


$min = $_GET['min'];
$max = $_GET['max'];
require 'connect.php';

$cmd =<<<EOD
SELECT
	name,
	price,
	quantity,
	quality
FROM items
WHERE price BETWEEN :min AND :max
ORDER BY price
EOD;
$stmt = $dbh->prepare($cmd);
$stmt->execute([':min' => $min, ':max' => $max]);

$rows = $stmt->fetchAll(PDO::FETCH_OBJ);

echo(json_encode($rows));

?>