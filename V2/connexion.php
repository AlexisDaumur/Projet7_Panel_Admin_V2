<?php
require_once 'connectDB.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <a href="index.php"><button type="button" name="button">Retour</button></a>
  <h1>Me connecter</h1>
    <form method="post" action="connexion.php">
        <p>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </p>
        <input type="submit" value="Sign in">
    </form>

    <?php
    if(!empty($_POST)){
       	$msg = "";
    	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= "~ Mauvais email<br/>";
        }
        if(empty($_POST['password'])){
            $msg .= "~ Mauvais mot de passe<br/>";
        }
        if(!empty($msg)){
            $msg = "Erreur. Veuillez vérifier votre saisie :<br/>".$msg;
            ?>
            <p><?php echo $msg; ?></p>
            <?php
        } else {
	    	$password_1 = $_POST['password'];
	    	$sql = "SELECT password,firstname
	    			from user
	    			where email = '{$_POST['email']}'";
	    	$result = $conn->query($sql) or die (mysqli_error($conn));
	    	$row = $result->fetch_row();
	    	$password_2 = $row[0];
	    	if (password_verify($password_1, $password_2)) {
          header('Location: visu.php');
	    	} else {
	    		echo "Mot de passe incorect";
	    	}
    	}
    }
