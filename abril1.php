<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="xmen.css">
<body>
<a aria-label='Thanks' class='h-button centered' data-text='METER' style="left: 280px; top: 400px;" href='./xmendatos.html'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>
	<a aria-label='Thanks' class='h-button centered' style="left: 100px;  top: 400px;" data-text='DESPLEGAR' href='./weaponxx.php'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>	
	<a aria-label='Thanks' class='h-button centered' style="left: 460px;  top: 400px;" data-text='INICIO
  s' href='./abril.html'>
  <span>4</span>
  <span>t</span>
  <span>o</span>
  <span>A</span>
  <span>P</span>
  <span>G</span>
</a>
<img class="logo" src="./xmenlogo.png" >
<div class="datos">

 <form action="abril1.php" method="POST">
  <label for="id">ID DEL PERSONAJE:</label>
  <input type="text" name="id" id="id">
  <input type="submit" name="submit" id="submit" value="Ingresar">
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
<p>Seleccione un personaje del siguiente menú:</p>
    <p>Personaje:
     <select id="$id">
    <option value="0"></option>
    <?php
       $query = $mysqli -> query ("SELECT id, nombre FROM equipoazul WHERE 1");

       while ($valores = mysqli_fetch_array($query)) {
           if ( $valores['id'] == $id ) { 
    ?>
       <option value = "<?php echo $valores['id']?>" selected><?php echo ($valores['nombre'])?></option>
    <?php
        } else {
    ?>
       <option value = "<?php echo $valores['id']?>"><?php echo ($valores['nombre'])?></option>
    <?php
        }
    }
    ?>
</select>
</form>
</body>
</html> 