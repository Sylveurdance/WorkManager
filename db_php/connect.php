<?php

// Usage : require_once("connect.php");

require('secret_connection.php');

$GLOBALS["BDD_ERROR"] = FALSE;

try {
	$GLOBALS["BDD_CONNECTION"] = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
} catch(Exception $e) {
	echo('Erreur : '.$e->getMessage().'<br />');
	echo('N° : '.$e->getCode());
	die();
}

/*
Exécute une reqûete SQL
*/
function execQuery($query, $columns=array()){
	try {
		$GLOBALS["BDD_CONNECTION"]->beginTransaction();
		$response=$GLOBALS["BDD_CONNECTION"]->query($query);
		$GLOBALS["BDD_CONNECTION"]->commit();
		// return something if it's a SELECT request
		if(!empty($columns)) return constructArrayFromResponse($response, $columns);
	} catch(Exception $e) {
		echo('Erreur : <pre>'.$e->getMessage().'</pre><br />');
		echo('N° : <pre>'.$e->getCode().'</pre>');
		$GLOBALS["BDD_ERROR"] = TRUE;
		$GLOBALS["BDD_CONNECTION"]->rollback();
		die();
	}
}

/*
Construct an array with the query result
*/
function constructArrayFromResponse($response, $columns){
	$r = array();
	while($line = $response->fetch(PDO::FETCH_OBJ)){
		$l = array();
		foreach ($columns as $c) {
			$l[$c] = $line->$c;
		}
		$r[] = $l;
	}
	return $r;
}

?>

