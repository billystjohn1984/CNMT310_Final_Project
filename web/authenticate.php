<?php
session_start();
require_once "classes/DataReader.php";

if( empty($_POST["username"]) || empty($_POST["password"]))
	badCreds("Please enter a Username and password.");
else {
	if (validUserPasswordCombo()) {
		$_SESSION["username"] = $_POST["username"];
		header("Location: playlistPage.php");
	}
	else {
		badCreds("Username and password invalid.");
	}
}

function validUserPasswordCombo() {
	$usersFile = new DataReader("../../webfiles/users.txt");
	$user = $usersFile->readUsers();
	if (empty($user[$_POST["username"]])) {
		return False;
	}
	else
		return $user[$_POST["username"]] == $_POST["password"];
}

function badCreds($message) {
	echo "<a href='login.php'>" . $message ."</a>";
}
?>
