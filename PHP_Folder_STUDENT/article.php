<?php
session_start();
if(!$_SESSION['Nom_Prenom_user']){
	header("location:/FinalVersion/LogInPage.php");
}
?>

<?php include 'database.php'; 
     $pdo = Database::connect(); 
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id=0;
     if(!empty($_GET['id'])){
        $id=$_REQUEST['id'];
        } 
      $sql = 'SELECT * FROM list_partenaires WHERE Id_partenaire='.$id.''; 
      $result=$pdo->query($sql);
      $row=$result->fetch();     
        $image=$row['Image_partenaire'];
        $titre=$row['Titre_partenaire'];
        $Description=$row['Description_partenaire'];
        $date=$row['date'];
        Database::disconnect();
    ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titre?></title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/FinalVersion/CSS_Folder/article1.css">
    <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,700|Mukta:500,700" rel="stylesheet">
    <link rel="stylesheet" href="/FinalVersion/CSS_Folder/article.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
</head>
<body>	
	<section class="infos"> 
				<div class="presentation">
					<div class="info">
						    <img src="<?php echo '/FinalVersion/PHP_Folder_ADMIN/image/'.$image; ?>" style="margin: top 0px;width:50%;">
						<p class="text-muted fst-italic mb-2"><em> <?php echo 'Delai:'.$date?></em></p>
						<br>
                        <article style="white-space: pre-line"><?php echo $Description?></article>
                    </div>
                          <div class="container">
                          <button  class="d-flex justify-content-center" ><a href="add.php">Postuler</a></span></button>   
                          </div>
                </div>					
            </div>
		</div>
	</section>
</body>
</html>