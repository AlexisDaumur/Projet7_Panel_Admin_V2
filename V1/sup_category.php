<?php require_once 'connectDB.php'; ?>


<!-- REQUETE POUR SUPPRIMER L'ID DE LA CATÉGORIE DEMANDÉ -->


<?php
if (isset($_GET['action'])){
 $req3 = "DELETE FROM stock where stock.product_id in (select product.id from product where product.category_id in (select id from category where))"
 $req2 = "DELETE FROM product WHERE category_id =".$_GET['id'];
 $req = "DELETE FROM category WHERE id =".$_GET['id'];
 mysqli_query($conn, $req2) or die (mysqli_error($conn));
 mysqli_query($conn, $req1) or die (mysqli_error($conn));
 mysqli_query($conn, $req) or die (mysqli_error($conn));
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
    <a href="sup_category.php?id=<?php echo $_GET['id']; ?>&action=confirm">Delete</a>
    <a href="category.php">Cancel</a>
  </body>
</html>
