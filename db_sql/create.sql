SET AUTOCOMMIT = 0;

START TRANSACTION;

-- TABLE

CREATE TABLE USERS (
	iduser INTEGER AUTO_INCREMENT,
	login VARCHAR(30) UNIQUE NOT NULL,
	passwd VARCHAR(50) NOT NULL,
	PRIMARY KEY(iduser)
)
ENGINE = InnoDB;

CREATE TABLE TYPE (
	idtype INTEGER AUTO_INCREMENT,
	genre VARCHAR(50) UNIQUE NOT NULL,
	PRIMARY KEY(idtype)
)
ENGINE = InnoDB;

CREATE TABLE ARTIST (
	idartist INTEGER AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	firstname VARCHAR(50) NOT NULL,
	dateofbirth DATE,
	nationality VARCHAR(30),
	PRIMARY KEY(idartist)
)
ENGINE = InnoDB;

CREATE TABLE WORK (
	idwork INTEGER AUTO_INCREMENT,
	title VARCHAR(50) NOT NULL,
	releasedate DATE,
	wlength INTEGER,
	nationality VARCHAR(50),
	wtype ENUM ('Movie','Serie','Book','Song','Other'),
	PRIMARY KEY(idwork)
)
ENGINE = InnoDB;

CREATE TABLE ASSOC_USER_WORK (
	iduser INTEGER NOT NULL,
	idwork INTEGER NOT NULL,
	seen BOOLEAN NOT NULL,
	mark INTEGER CHECK(mark>=0 AND mark<=10),
	remarks VARCHAR(255),
	lastupdate DATE,
	PRIMARY KEY(iduser,idwork),
	FOREIGN KEY(iduser) REFERENCES USERS(iduser),
	FOREIGN KEY(idwork) REFERENCES WORK(idwork)
)
ENGINE = InnoDB;

CREATE TABLE ASSOC_TYPE_WORK (
	idwork INTEGER NOT NULL,
	idtype INTEGER NOT NULL,
	PRIMARY KEY(idwork,idtype),
	FOREIGN KEY(idwork) REFERENCES WORK(idwork),
	FOREIGN KEY(idtype) REFERENCES TYPE(idtype)
)
ENGINE = InnoDB;

CREATE TABLE ASSOC_ARTIST_WORK (
	idartist INTEGER NOT NULL,
	idwork INTEGER NOT NULL,
	job ENUM ('Director','Actor','Singer','Writer','Director-Actor','Singer-Writer','Other'),
	PRIMARY KEY(idartist,idwork),
	FOREIGN KEY(idartist) REFERENCES ARTIST(idartist),
	FOREIGN KEY(idwork) REFERENCES WORK(idwork)
)
ENGINE = InnoDB;

COMMIT;

