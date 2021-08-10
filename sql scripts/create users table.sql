USE login_system;
CREATE TABLE users (
	usersID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usersUsername TINYTEXT NOT NULL,
    usersEmail TINYTEXT NOT NULL,
    usersPassword LONGTEXT NOT NULL
);
