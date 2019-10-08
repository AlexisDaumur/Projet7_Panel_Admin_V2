<!-- PAGE POUR MODIFIER MES TAILLES -->
<link rel="stylesheet" href="style.css">
<?php require_once 'connectDB.php'; ?>

<?php

			if(isset($_GET['id']) && $_GET['id']>0){
				$sql = "SELECT * FROM size WHERE id = ".$_GET['id'];
				$select = mysqli_query($conn, $sql);
				$s = mysqli_fetch_assoc($select);
			$msg ="";
			if(!empty($_POST)){
				if(empty($_POST['name'])){
        			$msg .="The name is required.<br/>";
   				}
				if(empty($msg)){
					$id = $_GET['id'];
					$name = $_POST['name'];
					$sql ="UPDATE size SET name='$name' WHERE id = $id";
					$select = mysqli_query($conn, $sql);
					header('Location: size.php');
				}
			}
			echo $msg;
	?>
	<form method="POST">
		<label>Ma taille</label>
		<input type="text" name="name" value="<?php echo $s['name']; ?>">

		<input class="update" type="submit" name="" value="Modifier">
	</form>
<?php
			}
	else {
		header('Location: index.php');
	}
?>
