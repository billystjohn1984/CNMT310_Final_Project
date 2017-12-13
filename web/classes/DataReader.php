<?php
define('__ROOT__', dirname(dirname(__File__)));
require_once __ROOT__."/includes/phpclasses/DB.class.php";
require_once "PlaylistEntry.php";
require_once "Song.php";
require_once "Stack.php";
require_once "Artist.php";
require_once "Album.php";

class DataReader {
	private $_file;

	function __construct($file = null) {
		$this->_file = $file;
	}

	function readFile() {
		return file_get_contents($this->_file);
	}

	function readUsers() {
		$users = Array();
		$file = $this->read();
		$userAndPass = explode(",", $file);
		for($i = 0; $i < count($userAndPass); $i++){
			$uAP = explode(":",$userAndPass[$i]);
			$users[$uAP[0]] = $uAP[1];
		}
		return $users;
	}

	function readPlaylist($playlistEntry) {
		// $playlist = Array();
		// $fullList = $this->readDB();
		// $entries = explode("\n", $fullList);
		// for($i = 0; $i < count($entries); $i++) {
		// 	$temp = explode(":",$entries[$i]);
		// 	$playlist[$i] = $temp;
		// }
		$db = new DB();
		$song = $playlistEntry -> getSong();
		$stack = $playlistEntry -> getStack();
		$artist = $playlistEntry ->getArtist();
		$album = $playlistEntry -> getAlbum();

		return $playlist;
	}

	function readSong($song, $db) {
		
	}

	function readStack($stack, $db) {

	}

	function readArtist($artist, $db) {

	}

	function readAlbum($album, $db) {

	}

	function readLabel($label, $db) {

	}


	function readPreviousHours() {

	}
}
?>
