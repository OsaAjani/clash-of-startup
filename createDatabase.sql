-- Create database and use it
CREATE DATABASE IF NOT EXISTS clash_of_startup;
USE clash_of_startup;

-- Create table of unes
CREATE TABLE IF NOT EXISTS startups
(
	id INT NOT NULL AUTO_INCREMENT,
	randomid VARCHAR(32) NOT NULL,
	nom VARCHAR(100) NOT NULL,
	description VARCHAR(1000) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (randomid),
	UNIQUE (nom)
);

-- Create table of votes
CREATE TABLE IF NOT EXISTS votes
(
	id INT NOT NULL AUTO_INCREMENT,
	ip VARCHAR(39) NOT NULL,
	at DATETIME NOT NULL,
	startup_id INT NOT NULL,
	desire INT NOT NULL,
	profitability INT NOT NULL,
	feasibility INT NOT NULL,
	budget INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT FOREIGN KEY (startup_id) REFERENCES startups(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS matchs
(
	id INT NOT NULL AUTO_INCREMENT,
	startup_id_one INT NOT NULL,
	startup_id_two INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT FOREIGN KEY (startup_id_one) REFERENCES startups(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (startup_id_two) REFERENCES startups(id) ON DELETE CASCADE
);
