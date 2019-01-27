-- The statement below sets the collation of the database to utf8
ALTER DATABASE wsalmons CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- this statement will drop the table and re-add it
DROP TABLE IF EXISTS author;

-- this creates the table
CREATE TABLE author (
	authorId BINARY(32) NOT NULL,
	authorActivationToken CHAR (32),
	authorAvatarUrl VARCHAR (255),
	authorEmail VARCHAR (128) not null,
	authorHash CHAR (97) not null,
	authorUsername VARCHAR (32) not null,
	UNIQUE (authorEmail),
	UNIQUE (authorUsername),
	INDEX (authorEmail),
	PRIMARY KEY(authorId)
);
