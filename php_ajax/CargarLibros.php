<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];
	$lineas=Array();
	$i=0;

	$sql='SELECT l.id_libro, l.nombre, l.edicion FROM Libro as l WHERE l.id_usuario='.$ID_Usuario;	
	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		while ($linea=mysqli_fetch_object($consulta)) {
			$lineas[$i]=$linea;
			$i++;
		}		
		mysqli_free_result ($consulta);	 			
	}else{
		echo "<h1>No se ejecuto Nada :(</h1";
	}

	for ($i=0; $i <count($lineas) ; $i++) {		
		echo '<option value="'.$lineas[$i]->id_libro.'"> Edición: '.$lineas[$i]->edicion." ".$lineas[$i]->nombre. '  </option>';
	}

	mysqli_close($coneccion); 
 ?>