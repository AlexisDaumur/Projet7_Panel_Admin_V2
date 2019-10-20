<?php
require_once 'connectDB.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<title></title>
	</head>
	<body>
		<!-- TABLEAU POUR AFFICHER MES VALEURS -->


			<div class="tableau">
				<table class="monTableau">
					<thead>
						<tr>
							<th>Product</th>
							<th>Category</th>
							<th>Brand</th>
							<th>Price</th>
              <th>Stock</th>
						</tr>
					</thead>
					<tbody>
						<?php
            $sql = 'SELECT DISTINCT product.name product,
            category.name category,
            brand.name brand,
            product.price price
            FROM product,category,brand
            WHERE product.category_id=category.id
            AND product.brand_id=brand.id';


						// `".$test."`   : Concaténation
						// prix > 10

						// WHERE nom LIKE "%ballerine%" :


            $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
            // var_dump($row);
						while ($row = mysqli_fetch_array($result)) {

							?>

							<tr>
								<td><?php echo $row['product'] ?></td>
								<td><?php echo $row['category'] ?></td>
                <td><?php echo $row['brand'] ?></td>
                <td><?php echo $row['price'] ?> $</td>
						    <td><?php if ($row['stock'] <= 0){$stock = 'indisponible';} else {$stock = $row['stock'];} echo $stock ?></td>
							</tr>

						<?php  } ?>
					</tbody>
				</table>
			</div>
		</form>
		<br>
	</body>
</html>
<script type="text/javascript" src="script.js"></script>
