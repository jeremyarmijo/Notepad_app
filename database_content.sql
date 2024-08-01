CREATE DATABASE IF NOT EXISTS notepad;

USE notepad;

CREATE TABLE IF NOT EXISTS user
(
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    -- name varchar(255) NOT NULL,
    -- firstname varchar(255) NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS notes
(
    email varchar(255) NOT NULL,
    -- id int NOT NULL AUTO_INCREMENT primary key,
    title varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    -- due_time datetime NOT NULL,
    -- user_id INT NOT NULL,
    -- FOREIGN KEY (user_id) REFERENCES user(id)
);