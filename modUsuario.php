<?php 
	session_start();
 	include_once('db/DB.php');

 	$db = new DB();
	$conn = $db->getConnection();


 	$email = $_SESSION['user'];
	$password = $_POST['password'];

	$query ="SELECT password from usuarios where email=:email";
		

	$stmt = $conn->prepare($query);
		$stmt->bindParam(':email',$email);
	
		//ejecutamos la consulta
		$stmt->execute();
		//obtener arreglo asociativo
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
	try{
		if($password = $stmt->fetch()){
					$pass1 = $_POST['pass1'];
					$pass2 = $_POST['pass2'];
					$website = $_POST['site'];
					$biografia = $_POST['biografia'];

					if ($pass1 == $pass2 and $pass1!=null) {
						$password = $pass1;
					}else {
						echo "error en contraseñas";
						}
						$sql =	"UPDATE usuarios
							SET password=:password, biografia=:biografia, website=:website 
							WHERE email=:email";
					
					
					$stmt= $conn->prepare($sql);
						$stmt->bindParam(':password',$password);
						$stmt->bindParam(':website',$website);
						$stmt->bindParam(':biografia',$biografia);


					$stmt->execute();
				}else{
						header('location:index.php?error=1');
		}
				}catch(Exception $e) {
			echo $e->getMessage();
		}
			
  ?>