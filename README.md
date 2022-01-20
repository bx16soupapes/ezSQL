# ezSQL
Fork of ezSQL_mysqli in simple way

Fork of ezSQL mysqli by Justin Vincent simplified in one file.

include_once "ezSQL_mysqli.php"; 

$db = new ezSQL_mysqli('username','password','database','localhost');

$rs = $db->get_results("SELECT * FROM test");

foreach ($rs as $usuario) {

echo "&#60;li&#62;$usuario->id $usuario->nombre $usuario->telefono  $usuario->pais";
  
}
