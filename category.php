<?php
header("Content-Type: text/xml");
$category = $_GET['category'];

require 'connect.php';

$cmd = <<<EOD
SELECT
    items.name,
	items.price,
	items.quantity,
	items.quality
FROM
    items INNER JOIN category ON items.FID_Category=category.ID_Category
WHERE
    category.name=:category;
EOD;

$stmt = $dbh->prepare($cmd);
$stmt->execute([':category'=> $category]);

$rows = $stmt->fetchAll();



?>

<items>
	<?php foreach($rows as $row): ?>
	<item>
		<name><?=$row['name']?></name>
		<price><?=$row['price']?></price>
		<quantity><?=$row['quantity']?></quantity>
		<quality><?=$row['quality']?></quality>
	</item>
	<?php endforeach; ?>
</items>