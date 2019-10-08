<?php require_once 'connectDB.php'; ?>


<!-- REQUETE POUR SUPPRIMER L'ID DE LA MARQUE DEMANDÉ -->


<?php
if (isset($_GET['action'])){
 $req = "DELETE FROM brand WHERE id =".$_GET['id'];
 mysqli_query($conn, $req);
 if (mysqli_affected_rows($conn) == 1){
   header('Location: brand.php');
 }
 else{
   echo "Votre ne peut pas être prise en compte.";
 }
}
 ?>


<!-- CONFIRMATION -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="sup_brand.php?id=<?php echo $_GET['id']; ?>&action=confirm">Delete</a>
    <a href="brand.php">Cancel</a>
  </body>
</html>
