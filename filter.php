<?php
  $conn=mysqli_connect('localhost','root','','souqstock') or die(mysqli_error()); 

   $sql="SELECT * FROM produit WHERE quantite_en_stock < quantite_minimale";
  $results=$conn->query($sql); //récupérer les lignes de la table .
  if($results-> num_rows > 0){
while($row = $results->fetch_assoc()){ 
  ?>
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
    

    
      <tr>
       <td> <?php echo $row['reference'] ?> </td>
       <td> <?php echo $row['libelle'] ?> </td>
       <td> <?php echo $row['quantite_minimale'] ?> </td>
       <td> <?php echo $row['quantite_en_stock'] ?> </td>
       <td>
       <a href='edit.php' >EDIT</a>
       </td>
       <td>
       <a href='delet'>DELETE</a></td>
       </tr>
    <?php }
    }?>

    </table>