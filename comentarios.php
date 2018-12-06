<?php include('template/header.php'); ?>
	<?php  include('template/menu.php'); ?>

	<section class="contents">
		<div class="posts">
			<div class="post">
				<div class="headPost">
					<img src="imgs/fotoperfil.jpg" id="fotoperfilpost" alt="Imagen de perfil de usuario">
					<h3 class="comment">All of humanity's problems stem from man's inability to sit quietly in a room alone. </h3>
				</div>
					<div class="imgPost">
						<div class="intera">
							
						</div>

						<img src="imgs/art.jpg" alt="Imagen de la publicación">
					</div>
					
			</div>
		</div>
	</section>
	
	<form action="addCom.php" method="POST">
	<div class="comentarios">
		<div class="com"> 
			<input class="busInput" type="text" name="comText" placeholder="escribe tu comentario">
			<button type="submit" class="postComment" name="postCom">Comentar</button>
		</div>
		<?php
		require('db/DB.php');
						$db = new DB();
						$conn = $db->getConnection();
				
						$result = $conn->prepare("SELECT comContent FROM comentarios ORDER BY idComentario DESC LIMIT 5");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){							

			?>


		<h3 class="">"<?php echo $row['comContent'];?>"</h3>
			<?php } ?>
	</div>
	</form>
</body>
</html>