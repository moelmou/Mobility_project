<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>


<?php
  
  $connect = mysqli_connect("localhost:3306", "root", "", "databasa_mobilite_international"); 
$ID=0; 
if(!empty($_GET['ID'])){
     $ID=$_REQUEST['ID'];
     } 
if(!empty($_POST)){
     $ID= $_POST['ID']; 
     $sql = "DELETE  FROM list_partenaires  WHERE Id_partenaire = $ID";
    $result = mysqli_query($connect, $sql);
        header("Location: Partenaires_v.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
      <title>Supprimer partenaire confirmation</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>

<div class="container">
  <div class="span10 d-flex justify-content-center offset1">
    <div class="row">            
      <form class="form-horizontal" action="delete_p.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $ID;?>"/>                 
         Est ce que vous etes sure de supprimer cet partenaire?
        <div class="form-actions">
          <button type="submit" class="btn btn-danger">Oui</button>
          <a class="btn" href="Partenaires_v.php">Non</a>
        </div>
      </form>
    </div>   
  </div>              
</div>
<!-- /container -->  </body>
</html>