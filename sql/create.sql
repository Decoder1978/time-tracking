/* NOTE: These can be run by doing something
along the lines of:

mysql < create.sql -D hci -u hci -p

*/

DROP TABLE IF EXISTS goals;
DROP TABLE IF EXISTS motivations;
DROP TABLE IF EXISTS records;

CREATE TABLE goals (
	id SERIAL PRIMARY KEY,
	user VARCHAR(20),
	name VARCHAR(50),
	type VARCHAR(7),
	description VARCHAR(255),
	value NUMERIC(5,2),
	comp VARCHAR(1)
);

CREATE TABLE motivations (
	id SERIAL PRIMARY KEY,
	goal_id INTEGER REFERENCES goals(id),
	text VARCHAR(255)
);

CREATE TABLE records (
	goal_id INTEGER REFERENCES goals(id),
	date DATE,
	value NUMERIC(5,2),
	PRIMARY KEY (goal_id, date)
);

/* INSERTIONS */

INSERT INTO goals (user, name, type, description, value, comp)
	VALUES ('default', 'Watch less TV', 'HOURLY', 'I would like to spend less time in front of the television.', 5, '<');
INSERT INTO goals (user, name, type, description, value, comp)
	VALUES ('default', 'Go to the gym', 'DAILY', 'Go to the gym at least twice each week.', 2, '>');
INSERT INTO goals (user, name, type, description, value, comp)
	VALUES ('default', 'Write novel', 'HOURLY', 'Spend at least two hours a week working on my twilight fan-fiction.', 2, '>');