
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
     $id = $_GET['id']; // get id through query string
     
      $sql = 'SELECT * FROM Candidats WHERE id='.$id.''; 
      $result=$pdo->query($sql);
      $data=$result->fetch(); 


if(isset($_POST['update'])) // when click on Update button
{
    $Nom=htmlentities(trim($_POST['Nom']));
    $Prenom=htmlentities(trim($_POST['Prenom']));
    $CNE=htmlentities(trim($_POST['CNE']));
    $Filiere=htmlentities(trim($_POST['Filiere']));
    $Categorie=htmlentities(trim($_POST['Categorie']));
    $Email=htmlentities(trim($_POST['Email']));
    $Mobilité=htmlentities(trim($_POST['Mobilité']));
    $Telephone=htmlentities(trim($_POST['Telephone']));
    $msql="UPDATE Candidats set Nom='$Nom',Email='$Email',Mobilité='$Mobilité', Prenom='$Prenom', CNE='$CNE', Filiere='$Filiere', Categorie='$Categorie', Telephone='$Telephone' where id='$id'";
    $Rslt=$pdo->query($msql);
    $statement = $pdo->prepare($sql);
    $edit=$statement ->execute(); 
    if($edit)
    {
        $pdo = Database::disconnect(); 
        header("location:Candidates.php"); // redirects to all records page
      
    }   	
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>  
    <div class="container">
            <br />
                <div class="row">
                <br />
                <h3>Modifier un candidat</h3>
                </div>
            <br />
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">    
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Nom">Nom</label><br>
                        <input type="text" name="Nom" value="<?php echo $data['Nom'] ?>" placeholder="Nom " Required><br>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Prenom">Prenom</label><br>
                        <input type="text" name="Prenom" value="<?php echo $data['Prenom'] ?>" placeholder="Prenom" Required><br>
                    </div>
            </div>
            <div class="form-row">    
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="CNE">CNE</label><br>
                        <input type="text" name="CNE" value="<?php echo $data['CNE'] ?>" placeholder=" CNE" Required><br>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Mobilité">Mobilité</label><br>
                        <input type="text" name="Mobilité" value="<?php echo $data['Mobilité'] ?>" placeholder="Mobilité" Required><br>
                    </div>
            </div>
            <div class="form-row">    
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Email">Email</label><br>
                        <input type="text" name="Email" value="<?php echo $data['Email'] ?>" placeholder="Email" Required><br>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Telephone">Telephone</label><br>
                        <input type="text" name="Telephone" value="<?php echo $data['Telephone'] ?>" placeholder="Telephone" Required><br>
                    </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-6 ">
                    <label class="control-label" for="Filiere">Filiere</label><br>
                    <input type="text" name="Filiere" value="<?php echo $data['Filiere'] ?>" placeholder="Filiere" Required><br>
                </div>
                <div class="form-group col-md-6 ">
                <label class="control-label" for="Categorie">Categorie</label><br>
                    <input type="text" name="Categorie" value="<?php echo $data['Categorie'] ?>" placeholder="Categorie" Required><br>
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
