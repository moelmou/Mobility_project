

<!doctype html>
<html lang="en">
  <head>
    <title> MOBILITE INTERNATIONALE </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--Custom styles-->
   <link rel="stylesheet" type="text/css" href="LogInPage.css">
</head>
<body>
<div class="container">
   <div><img src="/MobiliteInternationale/IMAGES/ensa.png" class="logo"></div>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>S'identifier</h3>
			</div>
			<div class="card-body">
				<form action="validation.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text "><img src="/MobiliteInternationale/IMAGES/icon1.png" alt="" width="100%"></span>
						</div>
						<input type="text" class="form-control" pattern=".+@usms.ac.ma" placeholder="E-mail@usms.ac.ma" name="Email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text "><img src="/MobiliteInternationale/IMAGES/icon2.png" alt="" width="100%"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Mot de passe" name="Mot_De_Passe">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn"  >
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="http://ensak.usms.ac.ma/ensak/contact/">Vous avez oublié votre mot de passe.?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>