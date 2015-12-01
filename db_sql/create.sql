BEGIN;

-- ENUM

CREATE TYPE enum_artist AS ENUM ('Director','Actor','Singer','Writer');

-- TABLE

CREATE TABLE USERS (
	login VARCHAR(30) PRIMARY KEY,
	passwd VARCHAR(50) NOT NULL
);

COMMIT;

