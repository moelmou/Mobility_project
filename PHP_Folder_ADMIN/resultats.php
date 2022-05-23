<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	
        header("location:/FinalVersion/LogInPage.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       <title>Resultats</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/FinalVersion/CSS_Folder/test1.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        
</head>
<body>
<section id="menu">
		<div class="logo">
			<img src='/FinalVersion/IMG_Folder/ensa.png'>
			<h2>Mobilite Internationale</h2>
		</div>
		<div class="items">
            <li><i class="fad fa-chart-pie-alt"></i><a href="adminnpage.php">Tableau de bord</a></li>
			<li><i class="fad fa-users"></i><a href="Partenaires_v.php">Partenaires</a></li>
			<li><i class="fad fa-user-graduate"></i><a href="MassUpload.php">Etudiant</a></li>
			<li><i class="fad fa-user-shield"></i><a href="Candidates.php">Candidat</a></li>
			<li style="border-left:px solid white;"><i class="fad fa-poll" ></i><a href="resultats.php">Resultat</a></li>
			<li><i class="fad fa-sign-out-alt"></i><a href="/FinalVersion/LogOutPage.php">Deconnexion</a></li>
		</div>
</section>

<section id="interface">
 
    <div class="tableaux">
			<h3 class="tableau">Publier les Resultats :</h3> 
    <br> <br>
            <div class="row text-center">
                    <div class="col-md-6">
                        <h4 class="my-3">GE</h4>
                        <a class="btn btn-primary btn-l text-uppercase" href="/FinalVersion/PHP_Folder_STUDENT/pub_resultat_ge.php">Publier resultat</a>
                    </div>	
				 <div class="col-md-6">
                        <h4 class="my-3">GPEE</h4>
                        <a class="btn btn-primary btn-l text-uppercase" href="/FinalVersion/PHP_Folder_STUDENT/pub_resultat_gp.php">Publier resultat</a>
				</div>	
				 <div class="col-md-6">
                        <h4 class="my-3">GI</h4>
                        <a class="btn btn-primary btn-l text-uppercase" href="/FinalVersion/PHP_Folder_STUDENT/pub_resultat_gi.php">Publier resultat</a>                  
				</div>
                 <div class="col-md-6">
                        <h4 class="my-3">IID</h4>
                        <a class="btn btn-primary btn-l text-uppercase" href="/FinalVersion/PHP_Folder_STUDENT/pub_resultat_iid.php">Publier resultat</a>                  
				</div>
                 <div class="col-md-6">
                        <h4 class="my-3">IRIC</h4>
                        <a class="btn btn-primary btn-l text-uppercase" href="/FinalVersion/PHP_Folder_STUDENT/pub_resultat_iric.php">Publier resultat</a>
				</div>
            </div>
    </div>                
</section>
</body>
</html>