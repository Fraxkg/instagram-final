<?php include('template/header.php'); ?>
	
	<?php include('template/menu.php'); ?>
	<section class="contents">
	
	
		</div>
		<form action="addPhoto.php" method="POST" enctype="multipart/form-data">
			<div class="publish">
				<h3 class="lab">Publica una imagen</h3>
				<input class="imgsel" type="file" name="select" required="" accept="*/image" >
				<button  type="submit" class="PostBut" name="postBut">Publicar</button>
			</div>
		</form>

			<div class="posts">
			<?php 
				
						require('db/DB.php');
						$db = new DB();
						$conn = $db->getConnection();
						$result = $conn->prepare("SELECT * FROM imagenes ORDER BY idImagen DESC LIMIT 5");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){							

			?>

					<div class="post">
					<div class="headPost">
							<?php 
					
					$nom=$row['idImagen'];
 				
				$pdo = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');

						$user = $_SESSION['user'];

						$stmt = $pdo->prepare("SELECT nombre from usuarios  left join imagenes  FROM imagenes where idImagen = :imagen");


						$stmt->bindParam(':imagen', $nom);

						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						$nombreP = $stmt->fetch();
						
						echo "<a>Subido por:".$nombreP['nombre']."</a>";
			 ?>



					</div>
						<div class="imgPost">
							<div class="intera">
								<a href="comentarios.php" class="hyper"><i class="far fa-comment-dots"></i></a>	
							</div> 
						<img class="disPhoto" src="uploads/<?php echo $row['img'];?>">	
						</div>
					</div>
			<?php } ?>
</body>
</html>
