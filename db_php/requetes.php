<?php

require_once("connect.php");

// Users
function getUsers(){
	$columns = Array("login", "passwd");
	$query = "SELECT ".implode(",", $columns)."
			FROM USERS";
	return execQuery($query, $columns);
}

function getUser($login){
	$columns = Array("login", "passwd");
	$query = "SELECT ".implode(",", $columns)."
			FROM USERS
			WHERE login='".$login."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function getUserID($login){
	$query = "SELECT iduser
			FROM USERS
			WHERE login='".$login."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addUser($login, $passwd){
	if(empty($login)) $login='NULL';else $login="'".$login."'";
	if(empty($passwd)) $passwd='NULL';else $passwd="'".$passwd."'";
	$query = "INSERT INTO USERS (login, passwd)
			VALUES (".$login.",".$passwd.")";
	execQuery($query);
}

function updateUser($login, $passwd){
	if(empty($login)) $login='NULL';else $login="'".$login."'";
	if(empty($passwd)) $passwd='NULL';else $passwd="'".$passwd."'";
	$query = "UPDATE USERS
			  SET login=".$login.", passwd=".$passwd."
			  WHERE login=".$login;
	execQuery($query);
}

function deleteUser($iduser){
	$query = "DELETE FROM USERS
			  WHERE iduser=".$iduser;
	execQuery($query);
}

// Types
function getTypes(){
	$columns = Array("genre");
	$query = "SELECT ".implode(",", $columns)."
			FROM TYPE";
	return execQuery($query, $columns);
}

function getaType($genre){
	$columns = Array("genre");
	$query = "SELECT ".implode(",", $columns)."
			FROM TYPE
			WHERE genre='".$genre."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function getTypeID($genre){
	$query = "SELECT idtype
			FROM TYPE
			WHERE genre='".$genre."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addType($genre){
	if(empty($genre)) $genre='NULL';else $genre="'".$genre."'";
	$query = "INSERT INTO TYPE (genre)
			VALUES (".$genre.")";
	execQuery($query);
}

function updateType($genreFrom, $genreTo){
	if(empty($genreFrom)) $genreFrom='NULL';else $genreFrom="'".$genreFrom."'";
	if(empty($genreTo)) $genreTo='NULL';else $genreTo="'".$genreTo."'";
	$query = "UPDATE TYPE
			  SET genre=".$genreTo."
			  WHERE genre=".$genreFrom;
	execQuery($query);
}

function deleteType($idtype){
	$query = "DELETE FROM TYPE
			  WHERE idtype=".$idtype;
	execQuery($query);
}

// Artists
function getArtists(){
	$columns = Array("name", "firstname", "dateofbirth", "nationality");
	$query = "SELECT ".implode(",", $columns)."
			FROM ARTIST";
	return execQuery($query, $columns);
}

function getArtist($name, $firstname, $dateofbirth){
	$columns = Array("name", "firstname", "dateofbirth", "nationality");
	$query = "SELECT ".implode(",", $columns)."
			FROM ARTIST
			WHERE name='".$name."' AND firstname='".$firstname."' AND dateofbirth='".$dateofbirth."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function getArtistID($name, $firstname, $dateofbirth){
	$query = "SELECT idartist
			FROM ARTIST
			WHERE name='".$name."' AND firstname='".$firstname."' AND dateofbirth='".$dateofbirth."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addArtist($name, $firstname, $dateofbirth, $nationality){
	if(empty($name)) $name='NULL';else $name="'".$name."'";
	if(empty($firstname)) $firstname='NULL';else $firstname="'".$firstname."'";
	if(empty($dateofbirth)) $dateofbirth='NULL';else $dateofbirth="'".$dateofbirth."'";
	if(empty($nationality)) $nationality='NULL';else $nationality="'".$nationality."'";
	$query = "INSERT INTO ARTIST (name, firstname, dateofbirth, nationality)
			VALUES (".$name.",".$firstname.",".$dateofbirth.",".$nationality.")";
	execQuery($query);
}

function updateArtist($name, $firstname, $dateofbirth, $nationality){
	if(empty($name)) $name='NULL';else $name="'".$name."'";
	if(empty($firstname)) $firstname='NULL';else $firstname="'".$firstname."'";
	if(empty($dateofbirth)) $dateofbirth='NULL';else $dateofbirth="'".$dateofbirth."'";
	if(empty($nationality)) $nationality='NULL';else $nationality="'".$nationality."'";
	$query = "UPDATE ARTIST
			  SET name=".$name.", firstname=".$firstname.", dateofbirth=".$dateofbirth.", nationality=".$nationality."
			  WHERE name=".$name." AND firstname=".$firstname;
	execQuery($query);
}

function deleteArtist($idartist){
	$query = "DELETE FROM ARTIST
			  WHERE idartist=".$idartist;
	execQuery($query);
}

// Works
function getWorks(){
	$columns = Array("title", "releasedate", "wlength", "nationality", "wtype");
	$query = "SELECT ".implode(",", $columns)."
			FROM WORK";
	return execQuery($query, $columns);
}

function getWork($title){
	$columns = Array("title", "releasedate", "wlength", "nationality", "wtype");
	$query = "SELECT ".implode(",", $columns)."
			FROM WORK
			WHERE title='".$title."'";
	$data=execQuery($query, $columns);
	if(empty($data[1])) return $data[0]; else return $data;
}

function getWorkID($title){
	$query = "SELECT idwork
			FROM WORK
			WHERE title='".$title."'";
	$data=execQuery($query, $columns);
	if(empty($data[1])) return $data[0]; else return $data;
}

function addWork($title, $releasedate, $wlength, $nationality, $wtype){
	if(empty($title)) $title='NULL';else $title="'".$title."'";
	if(empty($releasedate)) $releasedate='NULL';else $releasedate="'".$releasedate."'";
	if(empty($wlength)) $wlength='NULL';else $wlength="'".$wlength."'";
	if(empty($nationality)) $nationality='NULL';else $nationality="'".$nationality."'";
	if(empty($wtype)) $wtype='NULL';else $wtype="'".$wtype."'";
	$query = "INSERT INTO WORK (title, releasedate, wlength, nationality, wtype)
			VALUES (".$title.",".$releasedate.",".$wlength.",".$nationality.",".$wtype.")";
	execQuery($query);
}

// Always check if there is one or several titles at name $title before overriding more than one column
function updateWork($title, $releasedate, $wlength, $nationality, $wtype){
	if(empty($title)) $title='NULL';else $title="'".$title."'";
	if(empty($releasedate)) $releasedate='NULL';else $releasedate="'".$releasedate."'";
	if(empty($wlength)) $wlength='NULL';else $wlength="'".$wlength."'";
	if(empty($nationality)) $nationality='NULL';else $nationality="'".$nationality."'";
	if(empty($wtype)) $wtype='NULL';else $wtype="'".$wtype."'";
	$query = "UPDATE WORK
			  SET title=".$title.", releasedate=".$releasedate.", wlength=".$wlength.", nationality=".$nationality.", wtype=".$wtype."
			  WHERE title=".$title;
	execQuery($query);
}

function deleteWork($idwork){
	$query = "DELETE FROM WORK
			  WHERE idwork=".$idwork;
	execQuery($query);
}

// Assocs
function getAssoc_User_Works(){
	$columns = Array("seen", "mark", "remarks", "lastupdate");
	$query = "SELECT ".implode(",", $columns)."
			FROM ASSOC_USER_WORK";
	return execQuery($query, $columns);
}

function getAssoc_User_Work($iduser, $idwork){
	$columns = Array("seen", "mark", "remarks", "lastupdate");
	$query = "SELECT ".implode(",", $columns)."
			FROM ASSOC_USER_WORK
			WHERE iduser='".$iduser."' AND idwork='".$idwork."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addAssoc_User_Work($iduser, $idwork, $seen, $mark, $remarks, $lastupdate){
	if(empty($iduser)) $iduser='NULL';else $iduser="'".$iduser."'";
	if(empty($idwork)) $idwork='NULL';else $idwork="'".$idwork."'";
	if(empty($seen)) $seen='NULL';else $seen="'".$seen."'";
	if(empty($mark)) $mark='NULL';else $mark="'".$mark."'";
	if(empty($remarks)) $remarks='NULL';else $remarks="'".$remarks."'";
	if(empty($lastupdate)) $lastupdate='NULL';else $lastupdate="'".$lastupdate."'";
	$query = "INSERT INTO ASSOC_USER_WORK (iduser, idwork, seen, mark, remarks, lastupdate)
			VALUES (".$iduser.",".$idwork.",".$seen.",".$mark.",".$remarks.",".$lastupdate.")";
	execQuery($query);
}

function updateAssoc_User_Work($iduser, $idwork, $seen, $mark, $remarks, $lastupdate){
	if(empty($iduser)) $iduser='NULL';else $iduser="'".$iduser."'";
	if(empty($idwork)) $idwork='NULL';else $idwork="'".$idwork."'";
	if(empty($seen)) $seen='NULL';else $seen="'".$seen."'";
	if(empty($mark)) $mark='NULL';else $mark="'".$mark."'";
	if(empty($remarks)) $remarks='NULL';else $remarks="'".$remarks."'";
	if(empty($lastupdate)) $lastupdate='NULL';else $lastupdate="'".$lastupdate."'";
	$query = "UPDATE ASSOC_USER_WORK
			  SET seen=".$seen.", mark=".$mark.", remarks=".$remarks.", lastupdate=".$lastupdate."
			  WHERE iduser=".$iduser." AND idwork=".$idwork;
	execQuery($query);
}

function deleteAssoc_User_Work($iduser, $idwork){
	$query = "DELETE FROM ASSOC_USER_WORK
			  WHERE iduser=".$iduser." AND idwork=".$idwork;
	execQuery($query);
}

function getAssoc_Type_Works(){
	$query = "SELECT *
			FROM ASSOC_TYPE_WORK";
	return execQuery($query, $columns);
}

function getAssoc_Type_Work($idtype, $idwork){
	$query = "SELECT *
			FROM ASSOC_TYPE_WORK
			WHERE idtype='".$idtype."' AND idwork='".$idwork."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addAssoc_Type_Work($idtype, $idwork){
	if(empty($idtype)) $idtype='NULL';else $idtype="'".$idtype."'";
	if(empty($idwork)) $idwork='NULL';else $idwork="'".$idwork."'";
	$query = "INSERT INTO ASSOC_TYPE_WORK (idtype, idwork)
			VALUES (".$idtype.",".$idwork.")";
	execQuery($query);
}

function deleteAssoc_Type_Work($idtype, $idwork){
	$query = "DELETE FROM ASSOC_TYPE_WORK
			  WHERE idtype=".$idtype." AND idwork=".$idwork;
	execQuery($query);
}

function getAssoc_Artist_Works(){
	$columns = Array("job");
	$query = "SELECT ".implode(",", $columns)."
			FROM ASSOC_ARTIST_WORK";
	return execQuery($query, $columns);
}

function getAssoc_Artist_Work($idartist, $idwork){
	$columns = Array("job");
	$query = "SELECT ".implode(",", $columns)."
			FROM ASSOC_ARTIST_WORK
			WHERE idartist='".$idartist."' AND idwork='".$idwork."'";
	$data=execQuery($query, $columns);
	return $data[0];
}

function addAssoc_Artist_Work($idartist, $idwork, $job){
	if(empty($idartist)) $idartist='NULL';else $idartist="'".$idartist."'";
	if(empty($idwork)) $idwork='NULL';else $idwork="'".$idwork."'";
	if(empty($job)) $job='NULL';else $job="'".$job."'";
	$query = "INSERT INTO ASSOC_ARTIST_WORK (idartist, idwork, job)
			VALUES (".$idartist.",".$idwork.",".$job.")";
	execQuery($query);
}

function updateAssoc_Artist_Work($idartist, $idwork, $job){
	if(empty($idartist)) $idartist='NULL';else $idartist="'".$idartist."'";
	if(empty($idwork)) $idwork='NULL';else $idwork="'".$idwork."'";
	if(empty($job)) $job='NULL';else $job="'".$job."'";
	$query = "UPDATE ASSOC_ARTIST_WORK
			  SET job=".$job."
			  WHERE idartist=".$idartist." AND idwork=".$idwork;
	execQuery($query);
}

function deleteAssoc_Artist_Work($idartist, $idwork){
	$query = "DELETE FROM ASSOC_ARTIST_WORK
			  WHERE idartist=".$idartist." AND idwork=".$idwork;
	execQuery($query);
}

?>

