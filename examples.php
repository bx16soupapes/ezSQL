<?php

header('Content-Type: text/html; charset=ISO-8859-1');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include ezSQL core + mysqli
include_once "ezSQL_mysqli.php";
 
// Instanciar la clase con los parametros de la bbdd
$db = new ezSQL_mysqli('username','password','prueba','localhost');
?>
<html>
<head> 
<title>ezSQL</title>
</head>
<body>
<?php

echo "<h2>Ejemplos de ezSQL ".EZSQL_VERSION."</h2>";

// Seleccionar varios registros
$rs = $db->get_results("SELECT * FROM test");
 
//Numero de registros
echo "<h3>Un ejemplo de una consulta con varios registros (Registros: $db->num_rows)</h3>";
echo '$rs = $db->get_results("SELECT * FROM test"); // Registros: $db->num_rows<br>';

echo '
foreach ($rs as $usuario) {<br>
	echo "	$usuario->id $usuario->nombre $usuario->telefono  $usuario->pais";<br>
}<br>
';
//Recorrer la seleccion
foreach ($rs as $usuario) {
echo "<li>$usuario->id $usuario->nombre $usuario->telefono  $usuario->pais";
}
echo "<hr>";


//Seleccionar un registro
echo "<h3>Seleccionar un registro</h3>";
echo '$usuario = $db->get_row("SELECT * FROM test WHERE id = \'1\' ");';
$usuario = $db->get_row("SELECT * FROM test WHERE id = 3");
echo "<li>$usuario->id $usuario->nombre $usuario->telefono  $usuario->pais";

echo "<hr>";
echo "<h3>Seleccionar una variable</h3>";
echo '$telefono= $db->get_var("SELECT telefono FROM test WHERE id = \'1\' ");';
//Seleccionar una variable
$telefono= $db->get_var("SELECT telefono FROM test WHERE id = 1");
 
echo "<li>$telefono";



echo "<hr>";
echo "<h3>Muestra una columna de la seleccion</h3>";
echo '$nombres = $db->get_col("SELECT nombre, telefono, pais FROM test", 0);';
//Muestra una columna de la seleccion
$nombres = $db->get_col("SELECT nombre, telefono, pais FROM test", 0);
foreach ($nombres as $nombre) {
 echo "<li>$nombre";
}


echo "<hr>";
echo "<h3>Insertar un registro</h3>";
echo "INSERT INTO `test` (`id`, `nombre`, `telefono`, `pais`) VALUES (NULL, 'Claudio', '3120972', 'Chile');<br>";
echo 'if($db->rows_affected > 0) { echo "Inserción OK. Nuevo id: $db->insert_id"; } else { echo "Error en la inserción"; }';


echo "<hr>";
echo "<h3>Actualizar un registro</h3>";
//Actualizar un registro
echo '$db->query("UPDATE test SET telefono = \'3124403\' WHERE id = \'1\' ");<br>';
echo ' if($db->rows_affected > 0) { echo "Actualización OK"; } else { echo "Error en la actualización"; }';


echo "<hr>";
echo "<h3>Borrado</h3>";
echo '$db->query("DELETE FROM test WHERE id = \'1\'");<br>';


echo "<hr>";
echo "<h3>SQL</h3>";

echo "<pre>";
echo "--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `nombre`, `telefono`, `pais`) VALUES
(1, 'Claudio', '3120972', 'Chile'),
(2, 'Monica', '5580666', 'Chile'),
(3, 'Constanza', '8739501', 'Chile'),
(4, 'Javiera', '8450027', 'Chile'),
(5, 'Camila', '5277551', 'Chile');";
echo "</pre>";


?>
<hr>
basado en http://www.franaramayo.com/utilizar-ezsql-consultas-bases-de-datos/<br>
creado por Justin Vincent<br>
<br>
C.Marin 2020 - bx16soupapes@gmail.com
</body>
</html>