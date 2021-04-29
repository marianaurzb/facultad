<?php
/*alta_alumno..php
 * Recibe los datos de form_alumno.php, los procesa e inserta en la BD
 * author: urzua * date:
 *date: 18.03.21
 *
 *
 */

print_r($_POST);
$nombre =$_POST['nombre'];
$apaterno =$_POST['apaterno'];
$amaterno =$_POST['amaterno'];
$telefono =$_POST['telefono'];
$correoe =$_POST['correoe'];

//abrir conexion al manejador
//Verificar que exista el registro de acceso para este usuario desde este equipo, a esta BD en el archivo pg_hba.conf
$con = pg_connect("port= 5432 dbname=prueba1 user=usuario1 password=hola123.,") or die (pg_last_error());
if($con){
//	echo "se abre la conexion a la BD";
//generar la consulta

$query = "insert into alumnos (nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correoe_alumno) values('".$nombre. "','".$apaterno."','".$amaterno."','".$telefono."','".$correoe."')";
$query = pg_query($con,$query) or die (pg_last_error());
if($query){
	echo "<p>Se guardó el registro del alumno</p>";
	echo "<a href='index.php'>Volver al incio</a><br/>";
	echo "<a href='form_alumno.php'>Volver al formulario de registro</a>";
}
else{
	echo "no se pudo ejecutar la sentencia SQL";


}
}
else{
	echo "hubo un error al intentar conectar";
}


?>
