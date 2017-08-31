<?php
	//crear la consulta
	$servidor ="localhost";
	$usuario ="root";
	$password ="";
	$bd ="bdprueba";
	//generar la cadena de conexion
	$con = mysqli_connect($servidor,$usuario,$password,$bd);
	//recuperar el dato
	$id = $_GET['id_ciudad'];
	//crear la consulta
	$consulta = "DELETE FROM ciudad WHERE id = '$id'";
	//ejecuto la consutla
	mysqli_query($con,$consulta);
	//cierro la conexion
	mysqli_close($con);
	//regreso a la consulta
	header('Location:index.php');
?>