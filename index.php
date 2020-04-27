<html>
   <head>
   <meta charset="utf-8">
      <title>
          In stock
     </title>
     <script src="ajax.js"></script>
     <?php require 'data.php'; ?>
   </head>
   <body>
   <div class="container">

			<div class="form-container">
				<label for="vendor">Vendor</label>
				<select class="input" name="vendor" id="vendor">
					<?php foreach ($vendors as $vendor): ?>
					<option value="<?=$vendor?>"> <?=$vendor?> </option>
					<?php endforeach; ?>
				</select>
				<input class="input" type="button" value="Submit" onclick="getByVendor()">
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Quality</th>
						</tr>
					</thead>
					<tbody id="tbody-vendor">
					</tbody>
				</table>
			</div>

		</div>
            <div class="container">

			<div class="form-container">
				<label for="category">Category</label>
				<select class="input" name="category" id="category">
					<?php foreach ($categories as $category): ?>
					<option value="<?=$category?>"> <?=$category?> </option>
					<?php endforeach; ?>
				</select>
				<input class="input" type="button" value="Submit" onclick="getByCategory()">
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Quality</th>
						</tr>
					</thead>
					<tbody id="tbody-category">
					</tbody>
				</table>
			</div>

		</div>
		<div class="container">

			<div class="form-container">
				<label for="min">Start price</label>
				<input class="input" type="number" name="min" id="min" value=<?=$price_defaults['min']?>>

				<label for="end">Max price</label>
				<input class="input" type="number" name="max" id="max" value=<?=$price_defaults['max']?>>

				<input class="input" type="button" value="Submit" onclick="getByPrice()">
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Quality</th>
						</tr>
					</thead>
					<tbody id="tbody-price">
					</tbody>
				</table>
			</div>

		</div>


</body>
</html>