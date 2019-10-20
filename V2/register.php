<?php require_once 'form2.php'; ?>
<?php require_once 'connectDB.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chaustore</title>
  </head>
  <body>
    <a href="index.php"><button type="button" name="button">Retour</button></a>
    <h1>Formulaire d'inscription</h1>
    <?php if (!empty($message)) {
      echo $message;
    } else {
      echo $msg;
      echo $error;
     ?>
    <form class="inscription" action="register.php" action="form2.php" method="post">
      <p>
      <label for="firstName">Votre prénom --></label>
      <input id="firstName" type="text" name="firstName" placeholder="Prénom" value="<?php if (!empty($_POST['firstName'])) echo $_POST['firstName'];?>">
      </p>
      <p>
      <label for="lastName">Votre nom --></label>
      <input id="lastName" type="text" name="lastName" placeholder="Nom" value="<?php if (!empty($_POST['lastName'])) echo $_POST['lastName'];?>">
      </p>
      <p>
      <label for="email">Votre email --></label>
      <input id="email" type="email" name="email" placeholder="Mail" value="<?php if (!empty($_POST['email'])) echo $_POST['email'];?>">
      </p>
      <p>
      <label for="password">Mot de passe --></label>
      <input id="password" type="password" name="password" placeholder="Mot de passe" value="<?php if (!empty($_POST['password'])) echo $_POST['password'];?>">
      </p>
      <input type="submit" name="" value="Créer votre compte">
    </form>
    <?php
  }
  ?>
  </body>
</html>
