<?php
require_once 'header.php';
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
							<th>Size</th>
							<th>Color</th>
							<th>Stock</th>
              <th>Modify</th>
              <th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = 'SELECT
						product.name as productname,
						size.name as sizename,
						color.name as colorname,
						stock.stock
						FROM product
						INNER JOIN stock ON stock.product_id=product.id
						INNER JOIN size ON stock.size_id=size.id
						INNER JOIN color ON product.color_id=color.id';

            $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
            // var_dump($row);
						while ($row = mysqli_fetch_array($result)) {

							?>

							<tr>
								<td><?php echo $row['productname'] ?></td>
								<td><?php echo $row['sizename'] ?></td>
								<td><?php echo $row['colorname']?></td>
								<!-- <td><?php// echo $row['stock'] ?></td> -->
								<td><?php if ($row['stock'] <= 0){$stock = 'indisponible';} else {$stock = $row['stock'];} echo $stock ?></td>
                <td><a href="mod_stock.php?stock=<?php echo $row['stock'] ?>"><img class="poubelle" src="IMG/stylo.png" alt=""></a></td></td>
								<td><a href="mod_stock.php?stock=<?php echo $row['stock'] ?>"><img class="poubelle" src="IMG/poubelle.png" alt=""></a></td>
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
