 <?php 
	session_start();
 	include_once('db/DB.php');
 	$pdo = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');

	if (isset($_POST['postCom'])) {
		$comentario  = $_POST['comText'];

		$sql ="INSERT INTO comentarios(comContent, fecha, idImagen, idUsuario) 
							VALUES(:comCont, now(), '1', '1')";


		$stmt= $pdo->prepare($sql);
		$stmt->bindParam(':comCont', $comentario);
		

		$stmt->execute();

					header('location:comentarios.php');
		}
		else{
			?>
				<script>
					alert("Error al subir");
	                window.location.href=('feed.php');
				</script>
				<?php
		}
  ?>