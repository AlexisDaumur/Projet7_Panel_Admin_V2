<?php require_once 'connectDB.php'; ?>
<?php require_once 'register.php'; ?>

<?php
// var_dump($_POST);

  $message = "";
  $error = "";
  $msg = "";

  if(!empty($_POST)){

    if (empty($_POST['firstName'])) {
      $error .= "~ Veuillez saisir votre prénom.<br/>";
    }
    if (empty($_POST['lastName'])) {
      $error .= "~ Veuillez saisir votre nom.<br/>";
    }
    if (empty($_POST['email'])) {
      $error .= "~ Veuillez saisir votre email.<br/>";
    }
    if (empty($_POST['password'])) {
      $error .= "~ Veuillez saisir votre mot de passe.<br/>";
    }
    if (!empty($_POST) && empty($error)) {

      $message .= "Votre inscription est bien prise en compte <br/>";
      $fn = $_POST['firstName']; //recuperer mes valeurs
      $ln = $_POST['lastName'];
      $mail = $_POST['email'];
      $password = $_POST['password'];
      mail("$mail", "Confirmation", "Votre inscription est bien prise en compte.");

      $req = "INSERT INTO user (
              firstname,
              lastname,
              email,
              password)
              VALUES (
              '".$fn."',
              '".$ln."',
              '".$mail."',
              '".password_hash($password, PASSWORD_DEFAULT)."'
              )";

      mysqli_query($conn, $req);
    }
    if (isset($error)) {
      $msg .= "Erreur. Veuillez vérifier votre saisie :<br/><br/>";
    }
  }

  ?>
