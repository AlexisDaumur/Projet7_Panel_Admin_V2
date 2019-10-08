<?php require_once 'connectDB.php'; ?>


<!-- REQUETE POUR SUPPRIMER L'ID DU PRODUIT DEMANDÉ ET L'ID DU PRODUCT_ID DANS STOCK -->


<?php
if (isset($_GET['action'])){
 $req1 = "DELETE FROM stock WHERE product_id =".$_GET['id'];
 $req = "DELETE FROM product WHERE id =".$_GET['id'];
 mysqli_query($conn, $req1);
 mysqli_query($conn, $req);
 if (mysqli_affected_rows($conn) == 1){
   header('Location: product.php');
 }
 else{
   echo "Votre demande ne peut pas être prise en compte.";
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
    <a href="sup_product.php?id=<?php echo $_GET['id']; ?>&action=confirm">Delete</a>
    <a href="product.php">Cancel</a>
  </body>
</html>
