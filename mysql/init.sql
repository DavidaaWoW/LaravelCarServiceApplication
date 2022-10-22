CREATE DATABASE IF NOT EXISTS RSCHIR5;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON RSCHIR.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE RSCHIR5;
