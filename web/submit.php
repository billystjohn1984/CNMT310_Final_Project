<?php
require_once("classes/DataWriter.php");
$writer = new DataWriter;

$songTitle;
$artist;
$album;
$label;
$stack;

foreach($_POST as $key => $value) {
	switch ($key) {
		case "Song Title":
			$songTitle = $value;
			break;
		case "Artist":
			$artist = $value;
			break;
		case "Album":
			$album = $value;
			break;
		case "Label":
			$label = $value;
			break;
		case "Stack":
			$stack = $value;
			break;
	}
}

$artistDto = new Artist($artist);
$labelDto = new Label($label);
$albumDto = new Album($album, $labelDto);
$stackDto = new Stack($stack);
$songDto = new Song($artistDto, $song, 0, $albumDto);
$playlistEntry = new PlaylistEntry($songDto, $stackDto, $artistDto, $albumDto);

$writer -> writePlaylist($playlistEntry);
header("Location: playlistPage.php");
exit;
?>
