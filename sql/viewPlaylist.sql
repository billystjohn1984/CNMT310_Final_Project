CREATE VIEW Playlist AS 
SELECT song.title, artist.name AS artist, album.name AS album, label.name AS label, stack.name AS stack, PE.submittime
FROM song, album, label, playlistentry AS PE, stack, artist
WHERE PE.song = song.ID AND PE.stack = stack.ID AND song.artist = artist.ID AND song.album = album.ID AND album.label = label.ID;

select * from song;
