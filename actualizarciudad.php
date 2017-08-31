<?php
	//recepcionar los datos
	$id = $_GET['id_ciudad'];
	$nombre_ciudad = $_GET['nombre_ciudad'];
	$poblacion = $_GET['poblacion'];
	$nombre_pais = $_GET['nombre_pais'];
	//trasladar estos datos a una tabla de input para que puedan ser modificados
	echo "<table border=2px>";
	echo "<tr>";
  echo "<th>id</th>
        <th>nombre</th>
        <th>poblacion</th>
        <th>pais</th>
        <th>Actualizar</th>";
	echo "</tr>";
	//mostrar los datos para que sean modificados
	echo "<tr>";
	echo "<form action='actualizarciud.php' method='GET'>";
    echo "<td><input type='text' value='$id' disabled></td>";
    echo "<input type='hidden' name='txtid' value='$id'>";
    echo "<td><input type='text' name='txt_ciudad' value='$nombre_ciudad' required></td>";
    echo "<td><input type='text' name='txt_poblacion' value='$poblacion' required></td>";
    //crear la consulta
    $servidor ="localhost";
    $usuario ="root";
    $password ="";
    $bd ="bdprueba";
    //generar la cadena de conexion
    $con = mysqli_connect($servidor,$usuario,$password,$bd);
    //jalar con una consulta todos las provincias
      $provincias = "SELECT nombre FROM pais";
      $nombres = mysqli_query($con,$provincias);
      echo "<td><select name='paises'>";
      while ($reg = mysqli_fetch_assoc($nombres)){
        echo "<option value='".$reg['nombre']."'>".$reg['nombre']."</option>";
      }
      echo "</select></td>";
    //generar el boton actualizar
    echo "<td><input type='submit' name='btnactualizar' value='Actualizar'></td>";
	echo "</form>";	
	echo "</tr>";
	echo "</table>";

?>