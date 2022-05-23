<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>
<?php

$db = mysqli_connect("localhost","root","","databasa_mobilite_international");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['ID']; // get id through query string

$qry = mysqli_query($db,"select * from 	etudiant_list_concernes where ID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $fullname = $_POST['Nom_Prenom'];
    $CNE = $_POST['CNE'];
    $APG = $_POST['APG'];
	$Filliere = $_POST['Filliere'];
	$Email = $_POST['Email'];
	
    $edit = mysqli_query($db,"update etudiant_list_concernes set Nom_Prenom='$fullname', CNE='$CNE', APG='$APG', Filliere='$Filliere', Email='$Email' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:MassUpload.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($db);
    }    	
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Modifier un etudiant</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>  
    <div class="container">
            <br />
                <div class="row">
                <br />
                <h3>Modifier un etudiant</h3>
                </div>
            <br />
        <form method="POST">
            <div class="form-row">    
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="Nom_Prenom">Nom & Prenom</label><br>
                        <input type="text" name="Nom_Prenom" value="<?php echo $data['Nom_Prenom'] ?>" placeholder="Nom &Prenom" Required><br>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="control-label" for="CNE">CNE</label><br>
                        <input type="text" name="CNE" value="<?php echo $data['CNE'] ?>" placeholder="CNE" Required><br>
                    </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-6 ">
                    <label class="control-label" for="APG">APG</label><br>
                    <input type="text" name="APG" value="<?php echo $data['APG'] ?>" placeholder="APG" Required><br>
                </div>
                <div class="form-group col-md-6 ">
                    <label class="control-label" for="Filliere">Filliere</label><br>    
                    <input type="text" name="Filliere" value="<?php echo $data['Filliere'] ?>" placeholder="Filliere" Required><br>
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-6 ">
                    <label class="control-label" for="Email">Email</label><br>
                    <input type="text" name="Email" value="<?php echo $data['Email'] ?>" placeholder="Email" Required>
                </div>  
            </div><br/>
            <div class="form-row">  
                <div class="form-group col-md-12 ">
                    <input type="submit" name="update" class="btn btn-success"  value="Enregistrer les changements">  
                </div>  
                <div class="form-group col-md-12 ">
                <a class="btn btn-success" href="MassUpload.php">Retour sans enregistrement</a>                </div>       
            </div>
        </form>
    </div>
    </body>
</html>
