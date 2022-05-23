<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location: LogInPage.php");
}
  
$connect = mysqli_connect("localhost:3306", "root", "", "databasa_mobilite_international");
if(isset($_POST["upload"]))
{
 if($_FILES['list_file']['name'])
 {
  $filename = explode(".", $_FILES['list_file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['list_file']['tmp_name'], "r");
   while(($data = fgetcsv($handle, 0, ";"))!==FALSE)
   {

    $item1 = mysqli_real_escape_string($connect, $data[0]);  
    $item2 = mysqli_real_escape_string($connect, $data[1]);
    $item3 = mysqli_real_escape_string($connect, $data[2]);
    $item4 = mysqli_real_escape_string($connect, $data[3]);
    $item5 = mysqli_real_escape_string($connect, $data[4]);
    $item6 = mysqli_real_escape_string($connect, $data[5]);

    $query = "INSERT INTO etudiant_list_concernes(Nom_Prenom,APG,CNE,Filliere,Email,Mot_De_Passe)
    VALUES('$item1','$item2','$item3','$item4','$item5','$item6');";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<?php

$query = "SELECT * FROM etudiant_list_concernes";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Etudiants </title>
    <link href="/FinalVersion/CSS_Folder/test1.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
	  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
 <body>
  <div class="container">
    <section id="menu">
      <div class="logo">
        <img src='/FinalVersion/IMG_Folder/ensa.png'>
        <h2>Mobilite Internationale</h2>
      </div>
      <div class="items">
        <li><i class="fad fa-chart-pie-alt"></i><a href="adminnpage.php">Tableau de bord</a></li>
        <li><i class="fas fa-users"></i><a href="Partenaires_v.php">Partenaires</a></li>
        <li><i class="fad fa-user-graduate"></i><a href="MassUpload.php">Etudiant</a></li>
        <li><i class="fas fa-user-shield"></i><a href="Candidates.php">Candidat</a></li>
        <li><i class="fas fa-poll"></i><a href="resultats.php">Resultat</a></li>
        <li><i class="fas fa-sign-out-alt"></i><a href="/FinalVersion/LogOutPage.php">Deconnexion</a></li>
      </div>
    </section>
    <section id="interface">
      <div class="navigation">
        <div class="search">
          <i class="far fa-search"></i>
          <input id="myInput" onkeyup="myFunction()" type="text"placeholder="Rechercher..">
        </div>
      </div>
      <br />
      <div class="container">
        <h2 align="center">Liste des comptes d'étudiants concernees :</a></h2>
        <br />
        <form method="post" enctype='multipart/form-data'>
            <p>
              <label>Choisir un fichier(Format autorisé: CSV)</label><br>
              <input type="file" name="list_file" />
            </p>
            <br />
              <input type="submit" name="upload" class="btn btn-info" value="Charger" />
              <a href="add_student.php" class="btn btn-success">Ajouter un etudiant</a>
        </form>
        <br />
        <h1 align="center">Liste </h1>
        <br />
        <div class="table-responsive">
          <table id="myTable" class="table table-dark table-hover table-bordered">
              <thead>
               <tr>
                  <th>Full Name</th>
                  <th>APOGE</th>
                  <th>CNE</th>
                  <th>Filliier</th>
                  <th>Email</th>
                  <th>Edition</th>
                </tr>
              </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_array($result))
            {
              echo '
              <tr>
              <td>'.$row["Nom_Prenom"].'</td>
              <td>'.$row["APG"].'</td>
              <td>'.$row["CNE"].'</td>
              <td>'.$row["Filliere"].'</td>
              <td>'.$row["Email"].'</td>
              <td><a class="btn btn-primary mb-2" href="edit.php?ID=' . $row['ID'] . '">Modifier</a>
              <a class="btn btn-primary mb-2" href="delete.php?ID=' . $row['ID'] . '">Supprimer</a></td>
              </tr>
              ';
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
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