
<?php include 'gp_results.php';
?>
<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location: /FinalVersion/LogInPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
  <title>Publier resultats</title>
  </head>
  <body>
    <div class="container container d-flex d-flex align-items-center justify-content-center">
      
        <form action="pub_resultat_gp.php" method="post" enctype="multipart/form-data" >
        <h2>Publier Resultats de genie des procedees :</h2>
          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Titre : Date(AAAA-MM-JJ)"><br>
          </div>
          <div class="form-group">
            <input type="file" name="myfile"> <br>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary mb-2" name="save">Charger</button>
          <a class="btn btn-primary mb-2" href="/FinalVersion/PHP_Folder_ADMIN/Resultats.php">Retour</a> 
          </div>
        </form>
      
    </div>
  </body>
</html>