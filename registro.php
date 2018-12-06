<?php 
	session_start();
 	include_once('db/DB.php');
 	$pdo = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');

	if(isset($_POST['email'])){
		$confPass=  $_POST['pass2'];
		$password = $_POST['password'];

		if($password===$confPass){
			
			$datas = [
			    'nombre' => $_POST['nombre'],
			    'apePat' => $_POST['apePat'],
			    'apeMat' => $_POST['apeMat'],
			    'password' => $_POST['password'],
			    'email' => $_POST['email'],
];

		$sql ="INSERT INTO usuarios (nombre, apePat, apeMat, email, password) 
							VALUES(:nombre, :apePat, :apeMat, :email, :password)";

			
		$stmt= $pdo->prepare($sql);
		$stmt->bindParam(':nombre', $datas['nombre']);
		$stmt->bindParam(':apePat', $datas['apePat']);
		$stmt->bindParam(':apeMat', $datas['apeMat']);
		$stmt->bindParam(':email', $datas['email']);
		$stmt->bindParam(':password', $datas['password']);

		$stmt->execute();
		$_SESSION['user'] =  $_POST['email'];
			header('location:feed.php');
}else {
			?>
			<script >
				alert("contraseñas no coinciden")
	            window.location.href=('index.php');
			</script>
			<?php 
		}
	}
  ?>
	      