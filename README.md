# ezSQL
ezSQL_mysqli Simple 2.17
Fork of ezSQL mysqli by Justin Vincent simplified in one file.

include_once "ezSQL_mysqli.php"; 
$db = new ezSQL_mysqli('username','password','prueba','localhost');

$rs = $db->get_results("SELECT * FROM test");

foreach ($rs as $usuario) {
echo "<li>$usuario->id $usuario->nombre $usuario->telefono  $usuario->pais";
}
