<?php
require_once "Label.php";

class Album {
	private $_name;
	private $_label;

	public function __construct($name, $label) {
		$this->_name = $name;
		$this->_label = $label;
	}

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed _name
     *
     * @return self
     */
    public function setName($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get the value of Label
     *
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * Set the value of Label
     *
     * @param mixed _label
     *
     * @return self
     */
    public function setLabel($_label)
    {
        $this->_label = $_label;

        return $this;
    }

}
?>
