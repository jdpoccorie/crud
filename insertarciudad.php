6<?php
	//conexion
	$servidor ="localhost";
	$usuario ="root";
	$password ="";
	$bd ="bdprueba";
	//generar la cadena de conexion
	$con = mysqli_connect($servidor,$usuario,$password,$bd);
	//recepcionar los datos
	$nombre_ciudad = $_GET['txtciudad'];
	$poblacion = $_GET['txtpoblacion'];
	$nombre_pais = $_GET['paises'];
	//crear la consulta
	$id = "SELECT id 
		   FROM pais 
		   WHERE nombre = '$nombre_pais'";
	$datos = mysqli_query($con,$id);	   
	while ($fila = mysqli_fetch_assoc($datos)){
		$id_pais = $fila['id'];
	}
	//crear la consulta de insercion
	$sql = "INSERT INTO ciudad VALUES ('','$nombre_ciudad', '$poblacion','$id_pais')";
	//ejecutar la insercion
	mysqli_query($con, $sql);
	//cerrar la conexion
	mysqli_close($con);
	//regresar a la tabla distrito
	header('Location:index.php');
?>