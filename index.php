<?php
	//crear la consulta
	$servidor ="localhost";
	$usuario ="root";
	$password ="";
	$bd ="bdprueba";
	//generar la cadena de conexion
	$con = mysqli_connect($servidor,$usuario,$password,$bd);
	//creacion de la tabla
	echo "<table border=2px>";
	echo "<tr>";
  echo "<th>id</th>
        <th>nombre</th>
        <th>poblacion</th>
        <th>pais</th>
        <th>Actualizar</th>
        <th>Eliminar</th>";
	echo "</tr>";
	//mostrar los datos
	$consulta = "SELECT c.id AS id_ciudad, c.nombre AS nombre_ciudad, c.poblacion AS poblacion_ciudad, p.nombre AS nombre_pais
              FROM ciudad c INNER JOIN pais p
              ON c.id_pais = p.id";
	//ejecutar la consulta
	$registros = mysqli_query($con, $consulta);
	//trasladar los datos a la tabla
		//mostrar los datos de la tabla
		while ($fila = mysqli_fetch_assoc($registros)){
			echo "<tr>";	
			echo "<td>".$fila['id_ciudad']."</td>";
			echo "<td>".$fila['nombre_ciudad']."</td>";
			echo "<td>".$fila['poblacion_ciudad']."</td>";
			echo "<td>".$fila['nombre_pais']."</td>";
			echo "<td><a href='actualizarciudad.php?
					id_ciudad=".$fila['id_ciudad']."
					&nombre_ciudad=".$fila['nombre_ciudad']."
					&poblacion=".$fila['poblacion_ciudad']."
					&nombre_pais=".$fila['nombre_pais']." 
					'>Actualizar</a></td>";
			echo "<td><a href='eliminarciudad.php?
					id_ciudad=".$fila['id_ciudad']."'>Eliminar</a></td>";
			echo "</tr>";
		}
		//Implementar el boton insertar
		echo "<tr>";
		echo "<form action='insertarciudad.php' method='GET'>";
      echo "<td></td>";
      echo "<td><input type='text' name='txtciudad' required></td>";
      echo "<td><input type='text' name='txtpoblacion' required></td>";
      //jalar con una consulta todos las provincias
      $provincias = "SELECT nombre FROM pais";
      $nombres = mysqli_query($con,$provincias);
      echo "<td><select name='paises'>";
      while ($reg = mysqli_fetch_assoc($nombres)){
        echo "<option value='".$reg['nombre']."'>".$reg['nombre']."</option>";
      }
      echo "</select></td>";
      echo "<td><input type='submit' name='btninsertar' value='Insertar'></td>";
      echo "<td></td>";
		echo "</form>";	
		echo "</tr>";


	echo "</table>";

?>