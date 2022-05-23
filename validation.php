<?php
include_once('database.php');
$pdo = Database::connect(); 

session_start();

function test_input($data) {

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$Email = test_input($_POST["Email"]);
	$password = test_input($_POST["Mot_De_Passe"]);
	$stmt1 = $pdo->prepare("SELECT * FROM admin_list");
	$stmt2 = $pdo->prepare("SELECT * FROM Etudiant_list_concernes");
	
    
    
	$stmt1->execute();
	$stmt2->execute();
	$admins = $stmt1->fetchAll();
	$users = $stmt2->fetchAll();


    $valid=0;
	foreach($admins as $admin) 
		{
		if(($admin['Email'] == $Email) && ($admin['Mot_De_Passe'] == $password)) 
		{	
			$_SESSION['Nom_Prenom_admin']=$admin['Nom_Prenom'];
            $_SESSION['Email']=$admin['Email'];
			header("Location: /FinalVersion/PHP_Folder_ADMIN/adminnpage.php");
            $valid=1;
		}		
		}
	if($valid==0)
				{
	foreach($users as $user)
		{
		if(($user['Email'] == $Email) && ($user['Mot_De_Passe'] == $password)) 
		{	
			$_SESSION['Nom_Prenom_user']=$user['Nom_Prenom'];
            $_SESSION['Email']=$user['Email'];
			header("Location: /FinalVersion/PHP_Folder_STUDENT/EtudiantPage.php");
            $valid=1;
		}		
		}
				}
		if($valid==0){
			header("Location: LogInPage.php");
		}}
?>