<?php
require_once("BetterPage.php");
class Form extends BetterPage {
	function __construct($title = 'Default') {
		parent::__construct($title);
	}

	function createOption($name){
		parent::setMiddle("<option id='" . parent::cleanName($name) .  "'>" . $name . "</option>");
		return $this;
	}

	function createInput($name){
		parent::setMiddle($name . "<input type='text' name='" . parent::cleanName($name) . "'/>");
		return $this;
	}

	function createHiddenInput($name){
		parent::setMiddle("<input type='hidden' name='" . parent::cleanName($name) . "' value='" . parent::cleanName($name) . "'/>");
		return $this;
	}

	function createLogin(){
		parent::setMiddle("Username:<input type='text' id='username' name='username' placeholder='Username/Email'/>\nPassword:<input type='password' id='password' name='password'/>");
		return $this;
	}

	function createSubmit(){
		parent::setMiddle("<input type='submit' value='Submit'>");
		return $this;
	}

	function startForm($action, $method = "post") {
		parent::setMiddle("<form action='" . $action . "' method='" . $method . "'>");
		return $this;
	}

	function endForm() {
		parent::setMiddle("</form>");
		return $this;
	}
}
?>
