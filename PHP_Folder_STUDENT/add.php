<?php
session_start();
if(!$_SESSION['Nom_Prenom_user']){
	header("location:/FinalVersion/LogInPage.php");
}
?>


<?php require 'database.php';
 if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST)){ //
$NomError = ''; 
$PrenomError='';
$CNEError=''; 
$FiliereError =''; 
$MobilitéError =''; 
$CategorieError=''; 
$EmailError='';
$TelephoneError='';
$Nom = htmlentities(trim($_POST['Nom']));
$_SESSION['Nom']=$Nom;
$Prenom=htmlentities(trim($_POST['Prenom'])); 
$_SESSION['Prenom']=$Prenom;
$CNE = htmlentities(trim($_POST['CNE'])); 
$Filiere=htmlentities(trim($_POST['Filiere'])); 
$Mobilité = htmlentities(trim($_POST['Mobilité']));
$Categorie=htmlentities(trim($_POST['Categorie'])); 
$Email=htmlentities(trim($_POST['Email']));   
$Telephone=htmlentities(trim($_POST['Telephone']));
        $valid = true; 
        if (empty($Nom)) { 
            $NomError = 'ce champ peut pas etre vide';
             $valid = false; }
        if (empty($Prenom)) { 
                $PrenomError = 'ce champ peut pas etre vide';
                 $valid = false; }
        if (empty($CNE)) { 
            $CNEError = 'ce champ peut pas etre vide';
             $valid = false; } 
        if (empty($Filiere)) { 
            $FiliereError = 'ce champ peut pas etre vide'; 
            $valid = false; }
        if (empty($Mobilité)) { 
            $MobilitéError = 'ce champ peut pas etre vide'; 
            $valid = false; } 
        if(empty($Categorie)){
            $CategorieError ='ce champ peut pas etre vide'; 
            $valid= false; }
        if (empty($Email)) { 
            $EmailError = 'ce champ peut pas etre vide'; 
            $valid = false; } 
        else if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ){
            $EmailError = 'ce champ peut pas etre vide'; 
            $valid = false; } 
        if(empty($Telephone)){ 
            $TelephoneError ='ce champ peut pas etre vide'; 
            $valid= false; } 
        if ($valid) { 
            $pdo = Database::connect(); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO candidats (Nom,Prenom,CNE, Filiere, Mobilité,Categorie, Email,Telephone) values(?, ?, ? , ? , ? , ? , ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($Nom,$Prenom, $CNE, $Filiere, $Mobilité, $Categorie, $Email, $Telephone));
            Database::disconnect();
        }
        $_SESSION['NOM']=$Nom;
        $_SESSION['PRENOM']=$Prenom;}
            
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Candidater</title>
        <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <br />
        <div class="container">
            <br />
                <div class="row">
                <br />
                <h3>Postuler pour cette mobilité</h3>
                </div>
            <br />
            <form method="post" action="add.php">
                <div class="form-row">
                    <br />
                    <div class="form-group col-md-6 control-group <?php echo !empty($NomError)?'error':'';?>">
                        <label for="inputNom4" class="control-label">Nom</label>
                        <br />
                        <div class="controls">
                            <input class="form-control" id="inputNom4" name="Nom" type="text"  value="<?php echo !empty($Nom)?$Nom:'';?>">
                            <?php if (!empty($NomError)): ?>
                            <span class="help-inline"><?php echo $NomError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br />
                    <div class="form-group col-md-6 control-group<?php echo !empty($PrenomError)?'error':'';?>">
                        <label for="inputPreNom4"class="control-label">Prenom</label>
                        <br />
                        <div class="controls">
                            <input class="form-control" id="inputPreNom4" type="text" name="Prenom" value="<?php echo !empty($Prenom)?$Prenom:''; ?>">
                            <?php if(!empty($PrenomError)):?>
                            <span class="help-inline"><?php echo $PrenomError ;?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <br />
                <div class="form-group col-md-6 control-group<?php echo !empty($CNEError)?'error':'';?>">
                    <label for="inputCNE" class="control-label">CNE</label>
                        <br />
                    <div class="controls">
                        <input class="form-control" name="CNE" id="inputCNE" value="<?php echo !empty($CNE)?$CNE:''; ?>">
                        <?php if(!empty($CNEError)):?>
                            <span class="help-inline"><?php echo $CNEError ;?></span>
                        <?php endif;?>
                    </div>
                </div>
                    <br />         
                <div class="form-group col-md-6 control-group<?php echo !empty($filiereError)?'error':'';?>">
                    <label  class="control-label">Filiere</label>
                        <br />
                    <select class="form-control" name="Filiere">
                        <option value="">--Choisir Filiere--</option>
                        <option value="GI2">GI2</option>
                        <option value="GPEE">GPEE</option>
                        <option value="GRT">GRT</option>
                        <option value="GIID">GIID</option>
                        <option value="GE">GE</option>
                        <option value="GIRIC">GIRIC</option>
                    </select>
                            <?php if (!empty($filiereError)): ?>
                                <span class="help-inline"><?php echo $filiereError;?></span>
                            <?php endif;?>
                </div>
        </div>     
        <div class="form-row">
            <br />
                <div class="form-group col-md-6 control-group <?php echo !empty($MobilitéError)?'error':'';?>">
                    <label class="control-label">Mobilité</label>
                <br />
                    <div class="controls" >
                        <input class="form-control" name="Mobilité" type="text" placeholder="Mobilité" value="<?php echo !empty($Mobilité) ? $Mobilité:'';?>">
                            <?php if (!empty($MobilitéError)): ?>
                                <span class="help-inline"><?php echo $MobilitéError;?></span>
                            <?php endif;?>
                    </div>
                <br />
                </div>
            <br />
                <div class="form-group col-md-6  control-group <?php echo !empty($CategorieError)?'error':'';?>">
                    <label class="control-label">Categorie</label>
                    <select class="form-control" name="Categorie">
                        <option value="">--Choisir Categorie--</option>
                        <option value="PFE">PFE</option>
                        <option value="DD">DD</option>
                        <option value="Echange">Echange</option>
                        <option value="Suivi de semestres d’enseignement.">Suivi de semestres d’enseignement.</option>
                    </select>
                    <?php if (!empty($CategorieError)): ?>
                        <span class="help-inline"><?php echo $CategorieError;?></span>
                    <?php endif;?>
                </div>               
        </div>

        <div class="form-row">
            <br />
            <div class="form-group col-md-6 control-group <?php echo !empty($EmailError)?'error':'';?>">
                                <label class="control-label">Email</label>
                <div class="controls">
                    <input class="form-control" name="Email" type="text" placeholder="Email" value="<?php echo !empty($Email) ? $Email:'';?>">
                    <?php if (!empty($EmailError)): ?>
                        <span class="help-inline"><?php echo $EmailError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <br />
            <div class="form-group col-md-6 control-group <?php echo !empty($TelephoneError)?'error':'';?>">
                <label class="control-label">Telephone</label>
                <div class="controls">
                    <input class="form-control" name="Telephone" type="text" placeholder="Telephone" value="<?php echo !empty($Telephone) ? $Telephone:'';?>">
                    <?php if (!empty($TelephoneError)): ?>
                        <span class="help-inline"><?php echo $TelephoneError;?></span>
                    <?php endif;?>
                </div>
            <br />
            </div>
            <br />
        </div>
        <div class="form-actions ">
                        <input class=" btn btn-success" type="submit" name="submit" value="submit">
                        <a class=" btn btn-primary" href="Etudiantpage.php">Retour</a>
                        <a class="btn btn-success" target="_blank" href="DownloadPdf.php">Telecharger reçu</a>
        </div>

                    </form>
</div>

        
    </body>
</html>