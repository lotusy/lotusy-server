CREATE TABLE l_account.user
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	external_type INT(2) UNSIGNED,
	external_ref VARCHAR(33),
	email VARCHAR(128),
	password VARCHAR(41),
	username VARCHAR(41),
	nickname VARCHAR(41),
	gender VARCHAR(1),
	profile_pic VARCHAR(121),
	description VARCHAR(256),
	last_login DATETIME,
	superuser VARCHAR(2),
	blocked VARCHAR(2),

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;