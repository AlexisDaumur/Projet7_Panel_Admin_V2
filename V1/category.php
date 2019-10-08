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
				<input class="style" type="button" value="Ajouter une catégorie" onClick="AfficherMasquer()" />
				<form class="add" action="category.php" action="" method="post">
					<p id="formadd">
					<input type="text" name="add" placeholder="Votre catégorie" value="<?php if (!empty($_POST['add'])) echo $_POST['add'];?>">
					<input type="submit" name="" value="Envoyer">
					</p>
			</div>


			<!-- REQUETE FOR INSERT -->


			<?php
			$error = "";
			$msg = "";

			if(!empty($_POST)){

				if (empty($_POST['add'])) {
					$error .= "Veuillez remplir ce champ.<br/>";
				}
				if (!empty($_POST) && empty($error)) {
					$add = $_POST['add']; //recuperer mes valeurs

					$req = "INSERT INTO category (
									name)
									VALUES (
									'".$add."'
									)";

					mysqli_query($conn, $req);
				}
				if (isset($error)) {
					$msg .= "Erreur. Veuillez vérifier votre saisie :<br/><br/>";
				}
			}
			?>


			<!-- TABLEAU AVEC MES VALEURS -->


			<div class="tableau">
				<table class="monTableau">
					<thead>
						<tr>
							<th>n°</th>
							<th>Name</th>
							<th>Modify</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = 'SELECT * FROM category';
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><a href="mod_category.php?id=<?php echo $row['id'] ?>"><img class="poubelle" src="IMG/stylo.png" alt=""></a></td></td>
								<td><a href="sup_category.php?id=<?php echo $row['id'] ?>"><img class="poubelle" src="IMG/poubelle.png" alt=""></a></td>
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
