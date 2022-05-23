<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:LogInPage.php");
}
?>
<?php include 'database.php'; 
     $pdo = Database::connect(); 
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql1 = 'SELECT * FROM list_partenaires';
	  $sql2 = 'SELECT * FROM etudiant_list_concernes';
      $sql3 = 'SELECT * FROM candidats';
      $result1=$pdo->query($sql1);
	  $result2=$pdo->query($sql2);
	  $result3=$pdo->query($sql3);
	  $count_partenaires = $result1->rowCount();
	  $count_etudiants = $result2->rowCount();
	  $count_candidats= $result3->rowCount();
	  $pdo = Database::disconnect(); 
?>

	  
<!DOCTYPE html>
<html>
<head>

	<title>Adminpage</title>
	<meta name="name" content="content">
	<link href="/FinalVersion/CSS_Folder/style2.css"  rel="stylesheet" type="text/css">
	<link href="/FinalVersion/CSS_Folder/test1.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
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
			<li><i class="fas fa-users"></i><a href="Partenaires_v.php">Partenaires</a></li>
			<li><i class="fas fa-user-graduate"></i><a href="MassUpload.php">Etudiant</a></li>
			<li><i class="fas fa-user-shield"></i><a href="Candidates.php">Candidat</a></li>
			<li><i class="fas fa-poll"></i><a href="resultats.php">Resultat</a></li>
			<li><i class="fas fa-sign-out-alt"></i><a href="/FinalVersion/LogOutPage.php">Deconnexion</a></li>
		</div>
	</section>
	<section id="interface">
		<div class="container">
			<br><br><br>
			<h3 >Tableau de bord :</h3> 
			<div class="wrapper">
  <div class="counter-up">
    <div class="content">
      <div class="box">
        <div class="icon"><i class="fas fa-users"></i></div>
        <div class="counter"><?php echo  $count_partenaires ?></div>
        <div class="text">Partenaires </div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-users"></i></div>
        <div class="counter"><?php echo $count_candidats ?></div>
        <div class="text">Candidats </div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-users"></i></div>
        <div class="counter"><?php echo  $count_etudiants ?></div>
        <div class="text">Etudiants </div>
      </div>
	  </div>
    </div>
	</section>
	<script>
  $(document).ready(function(){
    $('.counter').counterUp({
      delay: 10,
      time: 1200
    });
  });
  </script>
</body>
</html>
  </div>
</body>
</html>