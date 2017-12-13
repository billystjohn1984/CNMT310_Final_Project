<?php
require_once "Page.php";
class BetterPage extends Page{
	private $_middle;

	private $_defaultTH = array("Time", "Song Title", "Artist", "Album", "Label");
	function __construct($title = 'Default'){
		parent::__construct($title);
	}

	//************Content generation*****************************************
	function setDefaultTop(){
		parent::addHeadItem("<link rel='stylesheet' type='text/css' href='styles/style.css'/>");
		parent::addHeadItem("<link rel='stylesheet' type='text/css' href='styles/style_acc.css'/>");
		parent::addHeadItem("<link rel='stylesheet' type='text/css' href='styles/style_log.css'/>");
		parent::addHeadItem("<link rel='stylesheet' type='text/css' href='styles/style_prev.css'/>");
		parent::addHeadItem("<script src='scripts.js'></script>");
		parent::setTop();
		return $this;
	}

	function setMiddle($content, $newLine = True){
		$this->_middle .= ($newline = True ? $content . "\n" : $content);
		return $this;
	}

	function getMiddle(){
		return $this->_middle;
	}

	function getPage(){
		return parent::getTop() . $this->getMiddle() . parent::getBottom();
	}

	function startWrapper() {
		$this->setMiddle("<div class='wrapper'>");
		return $this;
	}

	function endWrapper() {
		$this->setMiddle("</div>");
		return $this;
	}

	function startMain() {
		$this->setMiddle("<section class='main-container'>")
			->setMiddle("<div class='title-wrapper'>")
			->setMiddle("<h2>" . parent::getTitle() . "</h2>")
			->setMiddle("</div>")
			->setMiddle("<div class='main-content'>");
		return $this;
	}

	function endMain() {
		$this->setMiddle("</div>")
			->setMiddle("</section>")
			->setMiddle("</div>")
			->setFooter();
	}

	function setHeader() {
		$this->setMiddle("<header>")
			->setMiddle("<div class='header-cover'>")
			->setMiddle("<div class='head-title'>")
			->setMiddle("<h1>WWSP - 90FM</h1>")
			->setMiddle("<h2>DJ Hub</h2>")
			->setMiddle("</div>")
			->setMiddle("<div class='head-logo'><img alt='90fm' src='img/WWSP_90fm_mic.png' style='width:75px;height:90px;'></div>")
			->setMiddle("<div class='head-login'>");

			if (empty($_SESSION["username"])) {
				$this->setMiddle("<h3>Login</h3>")
					->startForm("authenticate.php")
					->createlogin()
					->setMiddle("<button name='submit' type='submit'>Login</button>")
					->endForm();
			}
			else {
				$this->setMiddle("<div id='logout'>")
					->setMiddle("<h3>Welcome " . $_SESSION["username"] . "!</h3><br>")
					->setMiddle("<h4>")
					->setMiddle("<a href='myAccount.php'>My Account</a>")
					->setMiddle("<a href='logout.php'>Log Out</a>")
					->setMiddle("</h4>")
					->createHiddenInput($_SESSION["username"])
					->setMiddle("</div>");
			}
			$this->setMiddle("</div>")
				->setMiddle("</div>")
				->setMiddle("<nav>")
				->setMiddle("<ul>")
				->setMiddle("<li><a href='prev.php'>Previously Played</a></li>")
				->setMiddle("<li><a href='log.php'>Playlist Log</a></li>")
				->setMiddle("<li><a href='reporting.php'>Free-Form Reporting</a></li>")
				->setMiddle("<li><a href='edit.php'>Admin Edit Page</a></li>")
				->setMiddle("</ul>")
				->setMiddle("</nav>")
				->setMiddle("</header>");
		return $this;
	}

	function setLoginMessage() {
		$this->setMiddle("<div id='log-css'>")
			->setMiddle("<h2 id='login_required'>**You do not have permission to view this page**</h2>")
			->setMiddle("</div>");
		return $this;
	}

	function setFooter() {
		$this->setMiddle("<footer class='footer-container'>")
			//->setMiddle("<div class='footer-container'>")
			->setMiddle("<p>WWSP-90FM Stevens Point, Wisconsin</p>")
			->setMiddle("<p>1101 Reserve Street (CAC 105) Stevens Point, WI 54481</p>")
			->setMiddle("<p>Office Phone: 715-346-3755 | Studio Phone: 715-346-2696</p>")
			//->setMiddle("</div>")
			->setMiddle("</footer>");
		return $this;
	}

	function startTable($tableHeaders = array("Time", "Song Title", "Artist", "Album", "Label")) {
		$page->setMiddle("<table>")
			->setMiddle("<tr>");
			foreach ($tableHeaders as $TH){
				$page->setMiddle("<th>" . $TH . "</th>");
			}
		$page->setMiddle("</tr>");
	}

	function addTableRow() {
		$page->setMiddle("<tr>");
	}

	//******Helper Functions************************************
	function cleanName($name){
		return trim(ucwords($name));
	}

	function checkUser() {
		if (empty($_SESSION["username"])) {
			header("Location: login.php");
		}
	}

	//Return: True if logged in
	function userLoggedIn() {
		return !empty($_SESSION["username"]);
	}

	function getCurrentSongs($playlist) {
		$currentHour = date("H");
		$currentSongs = array();
		foreach ($playlist as $song) {
			$time = $song[0];
			if ($time == $currentHour) {
				array_push($currentSongs, $song);
			}
		}
		return $currentSongs;
	}
}
?>
