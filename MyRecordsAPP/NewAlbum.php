<?php

/**
 * NewAlbum short summary.
 *
 * NewAlbum description.
 *
 * @version 1.0
 * @author peter
 */
class NewAlbum
{
    public $Artist;
    public $Album;
    public $AlbumID;
    public $ReleaseYear;
    public $Genre;
    public $Coverart;

    function set_artist($New_Artist) {
        $this->Artist = $New_Artist;
    }

    function get_Artist() {
        return $this->Artist;
    }
}