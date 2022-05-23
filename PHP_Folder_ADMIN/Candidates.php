
<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Candidats </title>
        
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link href="/FinalVersion/CSS_Folder/test1.css" rel="stylesheet" type="text/css">
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
    
<section id="menu">
		<div class="logo">
			<img src='ensa.png'>
			<h2>Mobilite Internationale</h2>
		</div>
		<div class="items">
            <li><i class="fad fa-chart-pie-alt"></i><a href="adminnpage.php">Tableau de bord</a></li>
			<li><i class="fas fa-users"></i><a href="Partenaires_v.php">Partenaires</a></li>
			<li><i class="fad fa-user-graduate"></i><a href="MassUpload.php">Etudiant</a></li>
			<li><i class="fad fa-user-shield"></i><a href="Candidates.php">Candidat</a></li>
			<li><i class="fad fa-poll"></i><a href="resultats.php">Resultat</a></li>
			<li><i class="fad fa-sign-out-alt"></i><a href="/FinalVersion/LogOutPage.php">Deconnexion</a></li>
		</div>
</section>
<section id="interface">
        <div class="navigation">
			<div class="search">
				<i class="far fa-search"></i>
				<input id="myInput" onkeyup="myFunction()" type="text" placeholder="Rechercher...">
			</div>
		</div>
    <div>
        <h2 class="tableau">Liste des Candidats :</h2> 
        <br>
    </div> 
    <div class="tableaux">
    <div class="row">       
        <div class="table-responsive">
            <table id="myTable" class="table table-dark table-hover table-bordered">
                <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>CNE</th>
                    <th>Filiere</th>
                    <th>Mobilite</th>
                    <th>Categorie</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </thead>
                <tbody  >
                    <?php include 'database.php'; 
                        $pdo = Database::connect(); 
                        $sql = 'SELECT * FROM candidats ORDER BY id DESC'; 
                    foreach ($pdo->query($sql) as $row) { 
                        echo '

                    <tr>'; echo'
                        <td>' . $row['Nom'] . '</td>
                    ';
                       
                        echo'
                    <td>' . $row['Prenom'] . '</td>
                    ';
                        echo'
                    <td>' . $row['CNE'] . '</td>
                    ';
                        echo'
                    <td>' . $row['Filiere'] . '</td>
                    ';
                        echo'
                    <td>' . $row['Mobilité'] . '</td>
                    ';
                        echo'
                    <td>' . $row['Categorie'] . '</td>
                    ';
                        echo'
                    <td>' . $row['Email'] . '</td>
                    ';
                        echo'
                    <td>' . $row['Telephone'] . '</td>
                    ';
                   
                    echo '
                    <td class="modifier"><a href="update_candidat.php?id='.$row['id'].' ">Modifier</a></td>
                                <td class="supprimer"><a href="delete_candidat.php?id='.$row['id'].'">Supprimer</a></td>	
                            ';
                            echo '</tr>                    ';
                    }
                    Database::disconnect(); //on se deconnecte de la base
                                            ;
                    ?>    
                </tbody>
            </table>
        </div>
    </div><br>
    <a class="btn btn-success" target="_blank" href="Download_students.php">Telecharger liste</a>

                </div>
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


    </script>
    </body>
</html>