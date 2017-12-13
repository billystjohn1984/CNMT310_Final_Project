<?php
require_once("BetterPage.php");
class Form extends BetterPage {
	function __construct($title = 'Default') {
		parent::__construct($title);
	}

	/**
	 * Add an option to the HTML body.
	 * 
	 * Using $name as the id and the value create an option and add it to the HTML body variable in the parent class.
	 * 
	 * @param string $name
	 * @return Form
	 */
	function createOption($name){
		parent::setMiddle("<option id='" . parent::cleanName($name) .  "'>" . $name . "</option>");
		return $this;
	}

	/**
	 * Add an input to the HTML body.
	 * 
	 * Using $name as the name create an input and add it to the HTML body variable in the parent class.
	 * 
	 * @param string $name
	 * @return Form
	 */
	function createInput($name){
		parent::setMiddle($name . "<input type='text' name='" . parent::cleanName($name) . "'/>");
		return $this;
	}

	/**
	 * Add a hidden input to the HTML body.
	 * 
	 * Using $name as the name create a hidden input and add it to the HTML body variable in the parent class.
	 * 
	 * @param string $name
	 * @return Form
	 */
	function createHiddenInput($name){
		parent::setMiddle("<input type='hidden' name='" . parent::cleanName($name) . "' value='" . parent::cleanName($name) . "'/>");
		return $this;
	}

	/**
	 * Add a login block to the HTML body.
	 * 
	 * Add a username and password input to the HTML body variable in the parent class.
	 * 
	 * @return Form
	 */
	function createLogin(){
		parent::setMiddle("Username:<input type='text' id='username' name='username' placeholder='Username/Email'/>\nPassword:<input type='password' id='password' name='password'/>");
		return $this;
	}

	/**
	 * Add a submit input to the HTML body.
	 * 
	 * @return Form
	 */
	function createSubmit(){
		parent::setMiddle("<input type='submit' value='Submit'>");
		return $this;
	}

	/**
	 * Add a starting form tag to the HTML body.
	 * 
	 * @param string $action Where to send the form on submit.
	 * @param string $method HTTP method to use, defaults to post.
	 * @return Form
	 */
	function startForm($action, $method = "post") {
		parent::setMiddle("<form action='" . $action . "' method='" . $method . "'>");
		return $this;
	}

	/**
	 * Add an ending form tag to the HTML body.
	 * 
	 * @return Form
	 */
	function endForm() {
		parent::setMiddle("</form>");
		return $this;
	}
}
?>
