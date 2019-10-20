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
					<form method="post" action="add_product.php" id="add_product">

							<input type="text" name="name" placeholder="Nom">

							<select name="category" form="add_product">
								<?php
								$sql = "SELECT name from category ";
					            $req = mysqli_query($conn,$sql);
					            while($row = mysqli_fetch_array($req)){
					        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
					            }
					            mysqli_free_result ($req);
					            ?>
							</select>

							<select name="brand" form="add_product">
								<?php
								$sql = "SELECT name from brand ";
					            $req = mysqli_query($conn,$sql);
					            while($row = mysqli_fetch_array($req)){
					        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
					            }
					            mysqli_free_result ($req);
					            ?>
							</select>

							<select name="color" form="add_product">
								<?php
								$sql = "SELECT name from color ";
					            $req = mysqli_query($conn,$sql);
					            while($row = mysqli_fetch_array($req)){
					        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
					            }
					            mysqli_free_result ($req);
					            ?>
							</select>

							<input type="number" name="price" placeholder="prix">


								<input type="radio" name="gender" value="H"> Male </input>
								<input type="radio" name="gender" value="F"> Female </input>



							<input type="submit" name="ok" value="Envoyer">

					</form>

					<?php
					$name =

					$req = "INSERT INTO product (name,) VALUES ('".$add."',)";

					mysqli_query($conn, $req); ?>



				</p>
			</form>






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
								<td><?php echo $row['productprice'] ?></td>
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
