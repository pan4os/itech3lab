<?php
require 'connect.php';


$res = $dbh -> prepare("SELECT `name` FROM `vendors`");
$res->execute();

$vendor_rows = $res->fetchAll(PDO::FETCH_NUM);

$vendors = [];

foreach ($vendor_rows as $row) {
	$vendors[] = $row[0];
}

$res = $dbh -> prepare("SELECT `name` FROM `category`");

$res->execute();

$category_rows = $res->fetchAll(PDO::FETCH_NUM);

$categories = [];

foreach ($category_rows as $row) {
	$categories[] = $row[0];
}
$cmd = <<<EDO
SELECT
	MIN(price) AS min,
	MAX(price) AS max
FROM items
EDO;
$stmt = $dbh->prepare($cmd);
$stmt->execute();

$price_defaults = $stmt->fetch(PDO::FETCH_ASSOC);
?>