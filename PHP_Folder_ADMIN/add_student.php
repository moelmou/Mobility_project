<?php
session_start();
if(!$_SESSION['Nom_Prenom_admin']){
	header("location:/FinalVersion/LogInPage.php");
}
?>


<?php require 'database.php'; if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST)){ 

$Nom_PrenomError='';
$APGError =''; 
$CNEError=''; 
$FilliereError =''; 
$EmailError='';
$Mot_De_Passe='';
$Nom_Prenom = htmlentities(trim($_POST['Nom_Prenom']));
$APG=htmlentities(trim($_POST['APG'])); 
$CNE = htmlentities(trim($_POST['CNE'])); 
$Filliere=htmlentities(trim($_POST['Filliere'])); 
$Email=htmlentities(trim($_POST['Email']));   
$Mot_De_Passe=htmlentities(trim($_POST['Mot_De_Passe']));
        $valid = true; 
        if (empty($Nom_Prenom)) { 
            $Nom_PrenomError = 'ce champ peut pas etre vide';
             $valid = false; }
        if (empty($APG)) { 
                $APGError = 'ce champ peut pas etre vide';
                 $valid = false; }
        if (empty($CNE)) { 
            $CNEError = 'ce champ peut pas etre vide';
             $valid = false; } 
        if (empty($Filliere)) { 
            $FilliereError = 'ce champ peut pas etre vide'; 
            $valid = false; }
        if (empty($Email)) { 
            $EmailError = 'ce champ peut pas etre vide'; 
            $valid = false; } 
        else if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ){
            $EmailError = 'ce champ peut pas etre vide'; 
            $valid = false; } 
        if(empty($Mot_De_Passe)){ 
            $Mot_De_PasseError ='ce champ peut pas etre vide'; 
            $valid= false; } 
        if ($valid) { 
            $pdo = Database::connect(); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO etudiant_list_concernes (Nom_Prenom, APG, CNE, Filliere, Email,  Mot_De_Passe) values(? , ? , ? , ? , ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($Nom_Prenom,$APG, $CNE, $Filliere, $Email, $Mot_De_Passe));
            Database::disconnect();
            header("Location: MassUpload.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajouter etudiant concernee</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="icon" type="image/x-icon" href="/FinalVersion/assets/favicon.ico" />
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
                <h3>Ajouter un etudiant</h3>
                </div>
            <br />
            <form method="post" action="/FinalVersion/PHP_Folder_ADMIN/add_student.php">
                <div class="form-row">
                    <br />
                    <div class="form-group col-md-6 control-group <?php echo !empty($Nom_PrenomError)?'error':'';?>">
                        <label for="inputNom_Prenom4" class="control-label">Nom_Prenom</label>
                        <br />
                        <div class="controls">
                            <input class="form-control" id="inputNom_Prenom4" name="Nom_Prenom" type="text"  value="<?php echo !empty($Nom_Prenom)?$Nom_Prenom:'';?>">
                            <?php if (!empty($Nom_PrenomError)): ?>
                            <span class="help-inline"><?php echo $Nom_PrenomError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br />
                    <div class="form-group col-md-6 control-group<?php echo !empty($APGError)?'error':'';?>">
                        <label for="inputAPG4"class="control-label">APG</label>
                        <br />
                        <div class="controls">
                            <input class="form-control" id="inputAPG4" type="text" name="APG" value="<?php echo !empty($APG)?$APG:''; ?>">
                            <?php if(!empty($APGError)):?>
                            <span class="help-inline"><?php echo $APGError ;?></span>
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
                <div class="form-group col-md-6 control-group<?php echo !empty($filliereError)?'error':'';?>">
                    <label  class="control-label">Filiere</label>
                        <br />
                    <select class="form-control" name="Filliere">
                        <option value="">--Choisir Filiere--</option>
                        <option value="GI2">GI2</option>
                        <option value="GPEE">GPEE</option>
                        <option value="GRT">GRT</option>
                        <option value="GIID">GIID</option>
                        <option value="GE">GE</option>
                        <option value="GIRIC">GIRIC</option>
                    </select>
                            <?php if (!empty($filliereError)): ?>
                                <span class="help-inline"><?php echo $filliereError;?></span>
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
            <div class="form-group col-md-6 control-group <?php echo !empty($Mot_De_PasseError)?'error':'';?>">
                <label class="control-label">Mot_De_Passe</label>
                <div class="controls">
                    <input class="form-control" name="Mot_De_Passe" type="text" placeholder="Mot_De_Passe" value="<?php echo !empty($Mot_De_Passe) ? $Mot_De_Passe:'';?>">
                    <?php if (!empty($Mot_De_PasseError)): ?>
                        <span class="help-inline"><?php echo $Mot_De_PasseError;?></span>
                    <?php endif;?>
                </div>
            <br />
            </div>
            <br />
        </div>
        <div class="form-actions">
                        <input type="submit" class="btn btn-success" name="submit" value="submit">
                        <a class="btn" href="Adminnpage.php">Retour</a>
        </div>

                    </form>
            
            
            
</div>

        
    </body>
</html>