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


		<!--BOUTON ADD  -->


		<div class="addCa">
			<input class="style" type="button" value="Ajouter un produit" onClick="AfficherMasquer()" />
			<form class="add" action="product.php" action="" method="post">
				<p id="formadd">
				<input type="text" name="add" placeholder="Nom du produit" value="<?php if (!empty($_POST['add'])) echo $_POST['add'];?>">

				<!-- REQUETE POUR M'AFFICHER LE NOM DE MES CATÉGORIES -->

				<select name="select_category" form="add_product">
								<?php
								$sql2 = "SELECT name from category";
								$req2 = mysqli_query($conn,$sql2);
								while ($row2 = mysqli_fetch_row($req2)){
										echo '<option value="'.$row2[0].'">'.$row2[0].'</option>';          // on affiche chaque champ
								}
								?>
						</select>

						<!-- REQUETE POUR M'AFFICHER LE NOM DE MES MARQUES -->

						<select name="select_brand" form="add_product">
										<?php
										$sql3 = "SELECT name from brand";
										$req3 = mysqli_query($conn,$sql3);
										while ($row3 = mysqli_fetch_row($req3)){
												echo '<option value="'.$row3[0].'">'.$row3[0].'</option>';          // on affiche chaque champ
										}
										?>
								</select>

								<!-- REQUETE POUR M'AFFICHER LE NOM DE MES COULEURS -->

								<select name="select_color" form="add_product">
												<?php
												$sql4 = "SELECT name from color";
												$req4 = mysqli_query($conn,$sql4);
												while ($row4 = mysqli_fetch_row($req4)){
														echo '<option value="'.$row4[0].'">'.$row4[0].'</option>';          // on affiche chaque champ
												}
												?>
										</select>

										<!-- <input type="number" name="" value="">
										<label for="">male</label>
										<input type="radio" name="Male" value="Male"> -->
				<!-- <input type="submit" name="" value="Envoyer"> -->
				</p>
		</div>


		<!-- TABLEAU POUR AFFICHER MES VALEURS -->


			<div class="tableau">
				<table class="monTableau">
					<thead>
						<tr>
							<th>n°</th>
							<th>Name</th>
							<th>Category</th>
							<th>Brand</th>
							<th>Color</th>
							<th>Image</th>
							<th>Price</th>
							<th>Gender</th>
							<th>Modify</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = 'SELECT product.id,
						product.name as productname,
						category.name as categoryname,
						brand.name as brandname,
						color.name as colorname,
						product.image as productimage,
						product.price as productprice,
						product.gender productgender
						FROM product,color,brand,category
						WHERE product.category_id=category.id
						AND product.color_id=color.id
						AND product.brand_id=brand.id
						-- AND product.id=8';

						// `".$test."`   : Concaténation
						// prix > 10

						// WHERE nom LIKE "%ballerine%" :


						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result)) {

							?>

							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['productname'] ?></td>
								<td><?php echo $row['categoryname'] ?></td>
								<td><?php echo $row['brandname'] ?></td>
								<td><?php echo $row['colorname'] ?></td>
								<td><?php echo $row['productimage'] ?></td>
								<td><?php echo $row['productprice'] ?> $</td>
								<td><?php echo $row['productgender'] ?></td>
									<td><a href="mod_product.php?id=<?php echo $row['id'] ?>"><img class="poubelle" src="IMG/stylo.png" alt=""></a></td></td>
								<td><a href="sup_product.php?id=<?php echo $row['id'] ?>"><img class="poubelle" src="IMG/poubelle.png" alt=""></a></td>
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
