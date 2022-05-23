
<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>
<?php include 'database.php'; 
     $pdo = Database::connect(); 
     if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST)){
        $Image_partenaire = $_FILES["uploadimage"]["name"];
        $tempname = $_FILES["uploadimage"]["tmp_name"];   
        $folder = "image/".$Image_partenaire;
        move_uploaded_file($tempname, $folder);
        $titre=htmlentities(trim($_POST['title']));
        $Description=htmlentities(trim($_POST['description']));
        $date=htmlentities(trim($_POST['date']));
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO list_partenaires (Image_partenaire,Titre_partenaire,Description_partenaire, date) values(? , ? , ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($Image_partenaire,$titre, $Description, $date));
            Database::disconnect();
     }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Ajouter partenaire</title>
</head>
<body>
    <br />
    <div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6 control-group">
                <label for="title"> Nom du partenaire</label>
                </div>
                <div class="form-group col-md-6 control-group">
                <input type="text" id="title" name="title" placeholder="Nom" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 control-group">
                <label for="description"> Description du partenaire</label>
                </div>
                <div class="form-group col-md-6 control-group">
                <textarea rows = "5" cols = "60"id="description" name="description" placeholder="Details.." required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 control-group">
                <label for="date"> Date de delai</label>
                </div>
                <div class="form-group col-md-6 control-group">
                <input type="text" id="date" name="date" pattern=".+-.+-.+" placeholder="DD-MM-YYYY" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 control-group">
                <label for="uploadimage"> Image du partenaire</label>
                </div class="form-group col-md-6 control-group">
                <div>
                <input type="file" id="uploadimage" name="uploadimage" value="" required/>
                </div>
            </div>
            <div class="form-action">
                <button type="submit" class="btn btn-primary" name="upload">UPLOAD</button>
            </div>
        </form><br>
        <a class="btn btn-secondary" href="/FinalVersion/PHP_Folder_ADMIN/Partenaires_v.php">Retour</a>
    </div>
</body>
</html>
