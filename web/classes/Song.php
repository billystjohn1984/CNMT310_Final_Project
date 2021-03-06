<?php
require_once "Artist.php";
require_once "Album.php";
class Song {
	private $_artist;
	private $_title;
	private $_playCount;
	private $_album;

	public function __construct($artist, $title, $playcount, $album) {
		$this->_artist = $artist;
		$this->_title = $title;
		$this->_playcount = $playcount;
		$this->_album = $album;
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
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed _title
     *
     * @return self
     */
    public function setTitle($_title)
    {
        $this->_title = $_title;

        return $this;
    }

    /**
     * Get the value of Play Count
     *
     * @return mixed
     */
    public function getPlayCount()
    {
        return $this->_playCount;
    }

    /**
     * Set the value of Play Count
     *
     * @param mixed _playCount
     *
     * @return self
     */
    public function setPlayCount($_playCount)
    {
        $this->_playCount = $_playCount;

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
