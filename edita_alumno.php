<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulario de alta de alumnos</title>
</head>
<body>
<?php
//Recibir el valor que viaja en la URL
$id = $_GET['id'];
//echo "el id del alumno es: ".id;
//Colsulta de os datos de alumno con ese ID, para mostrarlos en el formulario 
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola123.,") or die (pg_last_error());
if($con){
	$query = "select nombre_alumno, apaterno_alumno, amaterno_alumno, correoe_alumno, tel_alumno  from alumnos where id_alumno='".$id."'";
	$query = pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	print_r($resultado);

?>

	<h1>Formulario de altas de aumnos</h1>
	<p>Favor de ingresar los siguientes datos para registrar a los alumnos</p>
	<form name="alta" action="alta_alumno.php" method="post">
	<label for="nombre">Nombre:</label>
	<input type="text" name="nombre" value="<?php echo $resultado['nombre_alumno']; ?>"></br>
	<form for="apaterno">Apellido Paterno:</label>
	<input type="text" name="apaterno" value=<?php echo $resultado['apaterno_alumno']; ?>></br>
	<label for="amaterno">Apellido Materno:</label>
	<input type="text" name="amaterno" value=<?php echo $resultado['amaterno_alumno']; ?>></br>
	<label for="telefono">Numero de telefono:</label>
	<input type="telefono" name="telefono" value=<?php echo $resultado['tel_alumno']; ?>></br>
	<label for="correoe">Correo electronico:</label>
	<input type="email" name="correoe" value=<?php echo $resultado['correoe_alumno']; ?>></br>
	<input type="submit" name="enviar">

</form>
<?php
}
?>
</body>

	
	
</html>
	
	
	
	
	
	

	
	













</body>
</html>

