<?php
session_start();
require_once("classes/Form.php");
require_once("classes/DataReader.php");

$page=new Form('Playlist');

//$page->checkUser();
$playlistReader = new DataReader();
$playlist = $playlistReader->readPlaylist();
$currentSongs = $page -> getCurrentSongs($playlist);

$page->setDefaultTop();

$page->startWrapper();
$page->setHeader();
$page->startMain();
if (isset($_SESSION["username"])) {
	$page->startForm("submit.php")
		->setMiddle("<select>")
		->createOption("Placeholder")
	//TODO:Option generation from data source
		->setMiddle("</select>")
		->createInput("Song Title")
		->createInput("Artist")
		->createInput("Album")
		->createInput("Label")
		->createSubmit()
		->endForm();

	//This is a static example because the table needs to be reworked in the next sprint
	//TODO:Handle the case of no songs this hour
	$song = $currentSongs[0];
	$page->setMiddle("<h3>Recently Played</h3>")
		->setMiddle("<table>")
		->setMiddle("<tr>")
		->setMiddle("<th>Time</th>")
		->setMiddle("<th>Song Title</th>")
		->setMiddle("<th>Artist</th>")
		->setMiddle("<th>Album</th>")
		->setMiddle("<th>Label</th>")
		->setMiddle("</tr>")
		->setMiddle("<tr>")
		->setMiddle("<td>" . $song[0] . "</td>")
		->setMiddle("<td>" . $song[1] . "</td>")
		->setMiddle("<td>" . $song[2] . "</td>")
		->setMiddle("<td>" . $song[3] . "</td>")
		->setMiddle("<td>" . $song[4] . "</td>")
		->setMiddle("</table>")
		->setMiddle("<a href = 'INSERT LINK HERE'> See Previous Hour</a> ");
}
else {
	$page->setLoginMessage();
}
$page->endMain();

$page->setBottom();
print($page->getPage());
?>
