<!----------------------  RAFRAICHIR LA TABLE POUR AFFICHER LES NOUVELLES DONNEES (début)---------------------->
<?php
$conn=mysqli_connect('localhost','root','','souqstock') or die(mysqli_error()); 

if (isset($_GET['delete']))
{
  $référence = $_GET['delete'];
  $sql = "DELETE FROM `produit` WHERE `produit`.`reference` = ".$référence;
  $result = $conn->query($sql);
  if ($result == TRUE){
    echo "<script>alert(\"Product deleted\")</script>";
  }else{
      echo "Error:". $sql . "<br>". $conn->error;
  }
}
    
if(isset($_POST['save'])){
        $référence = $_POST['référence'];
        $libelle = $_POST['libelle'];
        $quantitéminimale = $_POST['quantitéminimale'];
        $quantite_en_stock = $_POST['quantite_en_stock'];
     

      $sql = "INSERT INTO produit VALUES ('$référence', '$libelle', '$quantitéminimale', '$quantite_en_stock')";

      $result =$conn->query($sql);

    if ($result == TRUE){
        echo "<script>alert(\"New product added successfuly\")</script>";
    }else{
        echo "Error:". $sql . "<br>". $conn->error;
    }

   // $conn->close();
      } 

      // mysqli_close($sql);
    ?>
<!----------------------  RAFRAICHIR LA TABLE POUR AFFICHER LES NOUVELLES DONNEES (fin)---------------------->
<!---------------------- Connecter php à base de données sql (début)---------------------->

<?php
  
   
$sql="SELECT * FROM `produit`";
$results=mysqli_query($conn,$sql); //récupérer les lignes de la table .
$product = mysqli_fetch_all($results);

mysqli_close($conn);
?>

<!---------------------- Connecter php à base de données sql (fin)---------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>


<!---------------------------------- Form en php (début) ---------------------------------->
<form action="" method="POST" class="form">

    <?php if(isset($_POST['edt'])){?>
    <input type="number"  name="NEWDATA"  placeholder='updated content'>
    <button type="submit" class="btn btn-primary" name="saveone" id="btn">update</button>
    <?php }else { ?>
    
   
    <input type="number"  name="référence" placeholder="Entrer référence">
    <input type="text"  name="libelle" placeholder="Entrer libelle">
    <input type="number"   name="quantitéminimale" placeholder="Entrer quantité minimal">
    <input type="number"  name="quantite_en_stock"  placeholder="Entrer quantité en stock">
    <button type="submit" class="btn btn-primary" name="save" id="btn">Save</button>
    <button type="submit" class="btn btn-danger" name="filter" id="btn"><a href="filter.php">filter</a></button>
    <div class="form-group">
    <br>
    
    </div>
    <?php } ?>
</form>
      <br>
    <!---------------------------------- Form en php (Fin) ---------------------------------->

<!---------------------------------- Tableau en php (début) ---------------------------------->
    <table class="table">
    <tr>
    <th>référence</th>
    <th>libelle</th>
    <th>quantité minimale</th>
    <th>quantité en stock</th>
    <th>actions</th>


    <td>
     
    </td>
 
    
      </tr>
    

    <?php foreach($product as $produit){ ?>
      <tr>
       <td> <?php echo $produit[0] ?> </td>
       <td> <?php echo $produit[1] ?> </td>
       <td> <?php echo $produit[2] ?> </td>
       <td> <?php echo $produit[3] ?> </td>
       <td>
       <a href='edit.php?idi=<?php echo $produit[0]?>' >EDIT</a>
      </td>
       <td><a href=<?php echo "?delete=".$produit[0] ?>>DELETE</a></td>
      </tr>
    <?php }?>

    </table>
    <!---------------------------------- Tableau en php (fin) ---------------------------------->

    
</body>
</html>

