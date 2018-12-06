<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<title>KLOPS</title>
</head>
<body>
	<div class="menu">
			<a href="index.php">Inicio</a>
			<a href="#">Perfil</a>
			<a href="index.php">Finalizar sesión</a>
			
			<?php 
				
 				
				$pdo = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');
					session_start();	

						$user = $_SESSION['user'];

						$stmt = $pdo->prepare("SELECT nombre FROM usuarios where email = :email");
						$stmt->bindParam(':email',$user);
						$stmt->execute();
						$nombreP = $stmt->fetch();
						echo "<a>Bienvenido ".$nombreP['nombre']."</a>";
			 ?>
		</div>
	</header>