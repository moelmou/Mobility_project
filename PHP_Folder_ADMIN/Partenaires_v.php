<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
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
	<title> Partenaires </title>
	<meta name="name" content="content">
	<link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
	<link href="/FinalVersion/CSS_Folder/test1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  
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
		<div class="navigation">
			<div class="search">
				<i class="far fa-search"></i>
				<input id="myInput" onkeyup="myFunction()" type="text"placeholder="Rechercher...">
			</div>
		</div>
		<div class="tableaux">
			<h3 class="tableau">Liste des partenaires :</h3> 
			<div class="statistique">
			<div class="board" id="bord" >
				<table  id="myTable" width="100%">		
					<thread>
						<tr>
							<td>Partenaire</td>
							<td>Date de delai</td>
						</tr>
					</thread>
                    
					<tbody>
						
                    <?php 
                        $pdo = Database::connect(); 
                        $sql = 'SELECT * FROM list_partenaires ORDER BY Id_partenaire DESC'; 
                        foreach ($pdo->query($sql) as $row) { 
                            $title=$row['Titre_partenaire'];
                            $date=$row['date'];
                            $id=$row['Id_partenaire'];
                            echo' 
                            <tr> 
                                <td class="insa">	
                                <div class="name">
                                        <h5>'.$title.'</h5>	
                                    </div>
                                <td class=delai>
                                    <h5> '.$date.'</h5>
                                </td>
                                <td class="modifier"><a href="edit_p.php?ID='.$id.' ">Modifier</a></td>
                                <td class="supprimer"><a href="delete_p.php?ID='.$id.'">Supprimer</a></td>	
                             </tr>

                                ';     }
                            Database::disconnect();?>
					</tbody>					
				</table>	
				<div class="ajouter" id="aj">
				<a class="btn btn-primary btn-l text-uppercase" href="add_p.php">Ajouter</a>
				</div>
			</div>
			
	</section>
		
            <!--reherche solon le nom-->
			<script >
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
  
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        } else {
        tr[i].style.display = "none";
                        }
                      }
                    }
}


    </script></body>
</html>