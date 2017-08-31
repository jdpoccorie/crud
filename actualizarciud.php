<?php
	//crear la consulta
	$servidor ="localhost";
	$usuario ="root";
	$password ="";
	$bd ="bdprueba";
	//generar la cadena de conexion
	$con = mysqli_connect($servidor,$usuario,$password,$bd);
	//recepcionar los datos
	$id = $_GET['txtid'];
	$ciudad = $_GET['txt_ciudad'];
	$poblacion = $_GET['txt_poblacion'];
	$pais = $_GET['paises'];
	//consulta de idprovincia
	$consulta = "SELECT id 
                FROM pais
                WHERE nombre = '$pais'";
	$datos = mysqli_query($con,$consulta);
	while ($reg = mysqli_fetch_assoc($datos)){
		$idpais = $reg['id'];
	}
	//consulta de actualizacion
	$sql = "UPDATE ciudad
          SET nombre = '$ciudad',
              poblacion = '$poblacion',
              id_pais = '$idpais'
          WHERE id = '$id'";
	//ejecutar la consulta
	mysqli_query($con,$sql);
	//cerrar la conexion
	mysqli_close($con);
	//regresar a la tabla distrito
	header('Location:index.php');				     


?>