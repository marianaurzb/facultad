<?php
/*consulta_profesores..php
 * Abre una conexion a la BD, colsuta los registros de alumnos y los muestra en una tabla 
 * author: urzua 
 *date:24 .03.21
 *
 *
 */

//abrir conexion al manejador
//Verificar que exista el registro de acceso para este usuario desde este equipo, a esta BD en el archivo pg_hba.conf
$con = pg_connect("port= 5432 dbname=prueba1 user=usuario1 password=hola123.,") or die (pg_last_error());
if($con){

//generar la consulta

$query = "select id_profesor, nombre_profesor,apaterno_profesor,amaterno_profesor,tel_profesor,correoe_profesor  from profesores";
$query = pg_query($con,$query) or die (pg_last_error());
//$arreglo = pg_fetch_array($query);
echo "<pre>";
//print_r($arreglo);
echo "<pre>";
if($query){
	echo "<p>Lista de profesores</p>";

?>
<table>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido paterno</th>
		<th>Apellido materno</th>
		<th>Telefono</th>
		<th>Correo electronico</th>

	</tr>
</thead>
<tbody>

<?php
	while($row = pg_fetch_array($query)){
	//	echo "el nombre: ".$row['nombre_alumno']."el apaterno: ".$row['apaterno_alumno']."el amaterno: ".$row['amaterno_alumno']."el telefono: ".$row['tel_alumno']. "el correo: ".$row['correoe_alumno'];
		echo "<tr>";
		echo "<td>".$row['id_profesor']."</td>";
		echo "<td>".$row['nombre_profesor']."</td>";
		echo "<td>".$row['apaterno_profesor']."</td>";
		echo "<td>".$row['amaterno_profesor']."</td>";
		echo "<td>".$row['tel_profesor']."</td>";
		echo "<td>".$row['correoe_profesor']."</td>";
		echo "<td><a href=' edita_profesor.php?id=".$row['id_alumno']."'>Editar registro</td>";
		echo "</tr>";
	}



?>
</table>
<?php


	echo "<a href='index.php'>Volver al incio</a><br/>";
	echo "<a href='form_profesor.php'>Volver al formulario de registro</a>";
}
else{
	echo "no se pudo ejecutar la sentencia SQL";

}
}
else{
	echo "hubo un error al intentar conectar";
}


?>
