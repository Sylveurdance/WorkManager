<?php

// Gets a list of all files in directory and all sub-directories
function getFilesInDirectory($path) {
	$files = array();
	if($dir = opendir($path)) {
		while(false !== ($file = readdir($dir))) {
			if($file != '.' && $file != '..') {
				if(is_dir($path."/".$file)) {
					// recursive
					$recfiles = getFilesInDirectory($path."/".$file);
					$files = array_merge($files, $recfiles);
				}
				else {
					array_push($files, $file);
				}
			}
		}
	}
	closedir($dir);
	return $files;
}

// Renames the file into the same directory
// $oldname and $newname contain the all path
function renameFile($oldname, $newname) {
	$currentDir = getcwd();
	chdir("/");
	$dir1 = dirname($oldname);
	$dir2 = dirname($newname);
	if(strcmp($dir1,$dir2)==0) {
		rename($oldname, $newname);
	}
	chdir($currentDir);
}

// Reads in live a music or a video file
function readFileInLive($file) {
	$extension = pathinfo($file, PATHINFO_EXTENSION);
	switch($extension) {
		case "mp3":
		case "mpeg":
		case "mpg":
		case "mpe":
            $ctype = "audio/mpeg";
            break;
        case "wav":
            $ctype = "audio/x-wav";
            break;
        case "mov":
            $ctype = "video/quicktime";
            break;
        case "avi":
            $ctype = "video/x-msvideo";
            break;
		default:
			return; // not handled... TODO mkv and m4a
	}
	header('Content-type: '.$ctype);
	header('Content-Length: '.filesize($file)); // provide file size
	header("Expires: -1");
	//header("location: ".$file);
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	set_time_limit(0);
	readfile($file);
}

?>

