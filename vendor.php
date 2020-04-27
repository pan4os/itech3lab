<?php
$vendor = $_GET['vendor'];

require 'connect.php';

$cmd = <<<EOD
SELECT
    items.name,
	items.price,
	items.quantity,
	items.quality
FROM
    items INNER JOIN vendors ON items.FID_Vendor=vendors.ID_Vendors
WHERE
    vendors.name=:vendor;
EOD;

$stmt = $dbh->prepare($cmd);
$stmt->execute([':vendor'=> $vendor]);

$rows = $stmt->fetchAll();

foreach($rows as $row) {
	echo '<tr>';
	for($i = 0; $i < 4; $i++) {
		echo "<td>$row[$i]</td>";
	}
	echo '</tr>';
}

?>