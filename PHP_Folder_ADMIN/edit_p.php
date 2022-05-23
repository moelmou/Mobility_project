
<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>

<?php



include 'database.php'; 
     $pdo = Database::connect(); 
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id = $_GET['ID']; // get id through query string
     
      $sql = 'SELECT * FROM list_partenaires WHERE Id_partenaire='.$id.''; 
      $result=$pdo->query($sql);
      $data=$result->fetch(); 


if(isset($_POST['update'])) // when click on Update button
{
    $Image_partenaire = $_FILES["uploadimage"]["name"];
    $tempname = $_FILES["uploadimage"]["tmp_name"];   
    $folder = "/FinalVersion/image/".$Image_partenaire;
    move_uploaded_file($tempname, $folder);
    $titre=htmlentities(trim($_POST['title']));
    $Description=htmlentities(trim($_POST['description']));
    $date=htmlentities(trim($_POST['date']));
    $msql="UPDATE list_partenaires set Image_partenaire='$Image_partenaire', Titre_partenaire='$titre', Description_partenaire='$Description', date='$date' where Id_partenaire='$id'";
    $Rslt=$pdo->query($msql);
    $statement = $pdo->prepare($sql);
    $edit=$statement ->execute(); 
    if($edit)
    {
        $pdo = Database::disconnect(); 
        header("location:Partenaires_v.php"); 
      
    }   	
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>  
    <div class="container">
            <br />
                <div class="row">
                <br />
                <h3>Modifier un partenaire</h3>
                </div>
            <br />
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">    
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="title">Titre</label><br>
                        <input type="text" name="title" value="<?php echo $data['Titre_partenaire'] ?>" placeholder="Nom &Prenom" Required><br>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="description">Description</label><br>
                        <input type="text" name="description" value="<?php echo $data['Description_partenaire'] ?>" placeholder="CNE" Required><br>
                    </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-6 ">
                    <label class="control-label" for="date">Date</label><br>
                    <input type="text" name="date" value="<?php echo $data['date'] ?>" placeholder="date" Required><br>
                </div>
                <div class="form-group col-md-6 ">
                <img src="<?php echo 'image/'.$data['Image_partenaire']; ?>" width="40%">
                <input type="file" name="uploadimage" value=""/>
                </div>
            </div>
            <div class="form-row">  
                <div class="form-group col-md-12 ">
                    <input type="submit" name="update" class="btn btn-success"  value="Enregistrer les changements">  
                </div>  
                <div class="form-group col-md-12 ">
                <a class="btn btn-success" href="Partenaires_v.php">Retour sans enregistrement</a>                </div>       
            </div>
        </form>
    </div>
    </body>
</html>
