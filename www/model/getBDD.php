<?php 

$serveur     = "localhost";
$utilisateur = "root";
$motDePasse  = "root";
$base        = "Utopia";
mysql_connect($serveur, $utilisateur, $motDePasse);
mysql_select_db($base) or die("Base de données inactive. ");

$nomTable = $_POST["nomTable"];

$sql = "SELECT * FROM ".$nomTable;
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

header('Content-type: application/json');

while( $content = mysql_fetch_object( $req) ) {
	$data[] = $content;
}

echo json_encode($data);

exit(0);
mysql_close();

?>