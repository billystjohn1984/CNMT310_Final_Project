<?php
define('__ROOT__', dirname(dirname(__File__)));
require_once __ROOT__."/includes/phpclasses/DB.class.php";
require_once "PlaylistEntry.php";
require_once "Song.php";
require_once "Stack.php";
require_once "Artist.php";
require_once "Album.php";

class DataWriter{
	function write($string){
		//file_put_contents("../../webfiles/playlist.txt", $string, $flags = FILE_APPEND);
		$db = new DB();
		$db->dbConnect();
	}

	function writePlaylist($playlistEntry) {
		$db = new DB();
		$song = $playlistEntry -> getSong();
		$stack = $playlistEntry -> getStack();
		$artist = $playlistEntry ->getArtist();
		$album = $playlistEntry -> getAlbum();

		$this->writeArtist($artist, $db)
			->writeLabel($album->getLabel(), $db)
			->writeAlbum($album, $db)
			->writeStack($stack, $db)
			->writeSong($song, $db);

		$db->dbCall("INSERT INTO PlaylistEntry(Song, Stack) VALUES ((SELECT ID FROM Song WHERE Song.title = '" . $song->getTitle() . "'), (SELECT ID FROM Stack WHERE Stack.name ='" . $stack->getName() . "'))");
	}

	function writeSong($song, $db) {
		$db->dbCall("INSERT INTO song(artist, title, playCount, album) VALUES((SELECT ID FROM artist WHERE artist.name = '" . $song->getArtist()->getName() . "'), ('" . $song->getTitle() . "'), (0), (SELECT ID FROM album WHERE album.name = '" . $song->getAlbum()->getName() . "'))");

		return $this;
	}

	function writeStack($stack, $db) {
		$db->dbCall("INSERT INTO stack(name) VALUES ('" . $stack->getName() . "')");

		return $this;
	}

	function writeArtist($artist, $db) {
		$db->dbCall("INSERT INTO artist(name) VALUES('" . $artist->getName() . "');");
		return $this;
	}

	function writeAlbum($album, $db) {
		$db->dbCall("INSERT INTO album(name, Label) VALUES('" . $album->getName() . "', (SELECT ID FROM label WHERE label.name = '" . $album->getLabel()->getName() . "'));");

		return $this;
	}

	function writeLabel($label, $db) {
		$db->dbCall("INSERT INTO Label(Name) VALUES('" . $label->getName() . "')");

		return $this;
	}
}
?>
