<?php
class PlaylistEntry {
	private $_song;
	private $_stack;
	private $_artist;
	private $_album;

	public function __construct($song, $stack, $artist, $album) {
		$this->_song = $song;
		$this->_stack = $stack;
		$this->_artist = $artist;
		$this->_album = $album;
	}

    /**
     * Get the value of Song
     *
     * @return mixed
     */
    public function getSong()
    {
        return $this->_song;
    }

    /**
     * Set the value of Song
     *
     * @param mixed _song
     *
     * @return self
     */
    public function setSong($_song)
    {
        $this->_song = $_song;

        return $this;
    }

    /**
     * Get the value of Stack
     *
     * @return mixed
     */
    public function getStack()
    {
        return $this->_stack;
    }

    /**
     * Set the value of Stack
     *
     * @param mixed _stack
     *
     * @return self
     */
    public function setStack($_stack)
    {
        $this->_stack = $_stack;

        return $this;
    }

    /**
     * Get the value of Artist
     *
     * @return mixed
     */
    public function getArtist()
    {
        return $this->_artist;
    }

    /**
     * Set the value of Artist
     *
     * @param mixed _artist
     *
     * @return self
     */
    public function setArtist($_artist)
    {
        $this->_artist = $_artist;

        return $this;
    }

    /**
     * Get the value of Album
     *
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->_album;
    }

    /**
     * Set the value of Album
     *
     * @param mixed _album
     *
     * @return self
     */
    public function setAlbum($_album)
    {
        $this->_album = $_album;

        return $this;
    }

}
?>
