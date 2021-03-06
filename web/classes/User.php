<?php
class User {
	private $_username;
	private $_password;
	private $_role;

    /**
     * Get the value of Username
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * Set the value of Username
     *
     * @param mixed _username
     *
     * @return self
     */
    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed _password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of Role
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->_role;
    }

    /**
     * Set the value of Role
     *
     * @param mixed _role
     *
     * @return self
     */
    public function setRole($_role)
    {
        $this->_role = $_role;

        return $this;
    }

}
?>
