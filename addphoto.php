 <?php 
	session_start();
 	include_once('db/DB.php');
 	$pdo = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');
 	$db = new DB();
	$conn = $db->getConnection();

	if (isset($_POST['postBut'])) {
		try{

		$email = $_SESSION['user'];
		

		$query ="SELECT idUsuario from usuarios where email=:email";
				

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':email',$email);
		$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetch();
		$idUsuario = $data['idUsuario'];


			
			$images=$_FILES['select']['name'];
	        $tmp_dir=$_FILES['select']['tmp_name'];
	        $imageSize=$_FILES['select']['size'];
			
			$upload_dir='uploads/';
			$imgExt=strtolower(pathinfo($images, PATHINFO_EXTENSION));
			$valid_extensions=array('.jpeg', '.jpg','.png');
			$img=rand(1000, 1000000).".".$imgExt;
			move_uploaded_file($tmp_dir, $upload_dir.$img);
			
			$query = "INSERT INTO imagenes(img, idUsuario) VALUES(:uimg, :uidUsuario)";

			$stmt= $pdo->prepare($query);
			$stmt->bindParam(':uidUsuario',$idUsuario);
			$stmt->bindParam(':uimg',$img);

			if($stmt->execute())
	        {
	            ?>
	            <script >
	                alert("Se subio exitosamente");
	                window.location.href=('feed.php');
	            </script>
	        <?php
	        }else {
	            ?>
	            <script>
	                alert("Error al subir");
	                window.location.href=('feed.php');
	            </script>
	        <?php
	        }
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
  ?>