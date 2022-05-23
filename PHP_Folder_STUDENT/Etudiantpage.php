
<?php
session_start();
if(!$_SESSION['Nom_Prenom_user']){
	header("location:LogInPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MOBILITE INTERNATIONALE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="/FinalVersion/CSS_Folder/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="/FinalVersion/IMG_Folder/ensa.png" width="150%" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#top">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Partenaire">Partenaires</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Resultat">Resultat Candidature</a></li>
                        <li class="nav-item"><a class="nav-link" href="/FinalVersion/LogOutPage.php">Deconnexion</a></li>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead " >
            <div class="container" id="top">
                <div class="masthead-subheading">BIENVENUE !</div>
                <div class="masthead-heading text-uppercase">à LA MOBILITE INTERNATIONALE</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#Partenaire">Aller au partenaires</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="Partenaire">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Partenaires</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <?php include 'database.php'; 
                        $pdo = Database::connect(); 
                        $sql = 'SELECT * FROM list_partenaires ORDER BY Id_partenaire DESC'; 
                        foreach ($pdo->query($sql) as $row) { 
                            $title=$row['Titre_partenaire'];
                            $date=$row['date'];
                            $id=$row['Id_partenaire'];
                            echo' 
                        <div class="col-md-3">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-school fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">'.$title.'</h4>
                            <p class="text-muted"> '.$date.'</p>
                            <a class="btn btn-primary btn-l text-uppercase" href="article.php?id='.$id.'">Savoir plus</a>
                            <a class="btn btn-primary btn-l text-uppercase" href="add.php">Candidater</a>
                        </div>
                
                
                        
               ';     }
               Database::disconnect();?>     
               </div>                                      
            </div>   
        </section>
        <!-- Services-->
        <section class="page-section" id="Resultat">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Resultats</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-2">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-code fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">GI</h4>
                        <p class="text-muted"><a href="GI.php"> Check Resultat</a></p>
                    </div>
                    <div class="col-md-2">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-charging-station fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">GE</h4>
                        <p class="text-muted"><a href="GE.php">Check Resultat</a></p>
                    </div>
                    <div class="col-md-2">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-flask fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">GP</h4>
                        <p class="text-muted"><a href="GP.php">Check Resultat</a></p>
                    </div>
                    <div class="col-md-2">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-secret fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">IRIC</h4>
                        <p class="text-muted"><a href="IRIC.php">Check Resultat</a></p>
                    </div>
                    <div class="col-md-2">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-qrcode fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">IID</h4>
                        <p class="text-muted"><a href="IID.php">Check Resultat</a></p>
                    </div>
                </div>
            </div>
        </section>
                <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start">Copyright &copy; <?php echo date("Y"); ?> </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/FinalVersion/JS_Folder/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
