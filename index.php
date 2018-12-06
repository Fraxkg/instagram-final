<?php include('template/header.php'); 
		error_reporting(E_ERROR | E_PARSE);
		session_destroy();
?>
		<section id="body" class="contents">
			<section class="left">
				<form action="login.php" method="POST">
				<div class="inisesion">
					<h3 class="lab">Iniciar Sesión</h3>
					<input class="nologInput" type="text" name="email" placeholder="E-mail">
					<input class="nologInput" type="password" name="password" placeholder="Contraseña">
					<button class="nologBut">Iniciar Sesión</button>
				</div>
			</section>
				</form>

			
			<section class="registro">
				<form action="registro.php" method="POST">			

				<h3 class="lab">Registrate</h3>
					<div>
						<input class="nologInput"  type="text" name="nombre" placeholder="Nombre completo" id="unique">
					</div>
					
					<div>
						<input class="nologInput"  type="text" name="apePat" placeholder="Apellido paterno">
						<input class="nologInput"  type="text" name="apeMat" placeholder="Apellido materno">
					</div>
						<div>
							<input class="nologInput"  type="password" name="password" placeholder="Contraseña">
							<input class="nologInput"  type="password" name="pass2" placeholder="Vuelva a ingresar la contraseña">
						</div>
					<div>
						<input class="nologInput"  type="text" name="email" placeholder="correo electronico " id="unique">
					</div>
				<button class="nologBut">Registrarse</button>
					</form>
				</section>
		</section>
</body>
</html>