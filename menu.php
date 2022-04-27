<?php
	// Connect to database
	$con = mysqli_connect("localhost","root","","xmen");
	
	// mysqli_connect("servername","username","password","database_name")

	// Get all the categories from category table
	$sql = "SELECT * FROM `equipoazul`";
	$all_categories = mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">	
</head>
<body>
	<form method="POST">
	
		<label>Select a Category</label>
		<select name="Category">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["id"];?>">
					<?php echo $category["nombre"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
		<br>
		<input type="submit" value="submit" name="submit">
	</form>
	<br>
	<?php
    
	$host = "localhost";
	$username = "root";
	$password = "";
	$basededatos ="xmen";
	 
  
  $conexion = mysqli_connect($host, $username, $password, $basededatos);
   
  if($conexion->connect_errno > 0){
	  die('Error: No es posible establecer la conexión: [' . $link->connect_error . ']');
	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT id, nombre, nombrereal, poderes, primeraaparicion, bio, imagen FROM equipoazul");
	$stmt->execute();
  }

$id=$conexion -> real_escape_string($_POST['id']);
$extraerdato = $conexion->query("SELECT * FROM equipoazul where id=$id");
$fetch = mysqli_fetch_array($extraerdato);
$id = $fetch['id'];
$nombre = $fetch['nombre'];
$nombrereal = $fetch['nombrereal'];
$poderes = $fetch['poderes'];
$primeraaparicion = $fetch['primeraaparicion'];
$bio = $fetch['bio'];
$imagen = $fetch['imagen'];

?>

<div class="personaje">
  <div class="nombre">Nombre Clave: <?php echo $nombre = $fetch['nombre']; ?><br></div> <br>
  <div class="nombre" >Nombre Real: <?php echo $nombrereal = $fetch['nombrereal']; ?><br></div><br>
  <div class="nombre">Poderes: <?php echo $poderes = $fetch['poderes']; ?><br></div><br>
  <div class="nombre">Primera Aparicion: <?php echo $primeraaparicion = $fetch['primeraaparicion']; ?><br></div><br>
  <div class="nombre">Bio: <?php echo $bio = $fetch['bio']; ?></div><br>

  <div class="foto" style="left: 300px; top: -205px;" >
    <img class="crop" src="data:image/jpeg;base64,<?php echo  base64_encode($fetch['imagen']); ?>">
  </div>

</div>
<<i class="fa fa-hourglass-1" aria-hidden="true"></i>
</body>
</html>
