<?php

// Usage : require_once("connect.php");

include 'secret_connection.php';

$GLOBALS["BDD_ERROR"] = FALSE;

try {
	$GLOBALS["BDD_CONNECTION"] = new PDO('pgsql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
} catch(Exception $e) {
	echo('Erreur : '.$e->getMessage().'<br />');
	echo('N° : '.$e->getCode());
	die();
}

/*
Exécute une reqûete SQL
*/
function execQuery($query){
	try {
		$response=$GLOBALS["BDD_CONNECTION"]->query($query);
		$err=$GLOBALS["BDD_CONNECTION"]->errorInfo();
		if (!empty($err[2])) {
			echo "error <pre>query= ".$query."</pre><br>";
			echo "<pre>".$err[2]."</pre><br>";
			$GLOBALS["BDD_ERROR"] = TRUE;
		}
		return $response;
	} catch(Exception $e) {
		echo('Erreur : <pre>'.$e->getMessage().'</pre><br />');
		echo('N° : <pre>'.$e->getCode().'</pre>');
		$GLOBALS["BDD_ERROR"] = TRUE;
		die();
	}
}

?>

