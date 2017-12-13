INSERT INTO Role(Name, permissionLevel)
VALUES(
'nameDummy',
'1'
);

INSERT INTO RoleIDs(roleID, userID)
VALUES(
(SELECT ID FROM Role WHERE role.name = 'nameDummy'),
'1'
);

INSERT INTO User(username, password, role)
VALUES(
'userDummer',
'passwordDummy',
(SELECT ID FROM RoleIDs WHERE RoleIDs.userID = LAST_INSERT_ID())
);

INSERT INTO Artist(Name)
VALUES(
'Nirvana'
);

INSERT INTO Label(Name)
VALUES(
'David Geffen Records'
);

INSERT INTO Album(name, Label)
VALUES(
'In Utero',
(SELECT ID FROM Label WHERE Label.Name = 'David Geffen Records')
);

INSERT INTO Song(Artist, Title, playCount, Album)
VALUES(
(SELECT ID FROM Artist WHERE Artist.name = 'Nirvana'), 
('Radio Friendly Unit Shifter'),
((playCount = playCount +1)),
(SELECT ID FROM Album WHERE Album.name = 'In Utero'));

INSERT INTO Stack(Name)
VALUES (
'stackDummy'
);

INSERT INTO PlaylistEntry(Song, Stack)
VALUES (
(SELECT ID FROM Song WHERE Song.title = 'Radio Friendly Unit Shifter'), 
(SELECT ID FROM Stack WHERE Stack.name ='stackDummy')
);