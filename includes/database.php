<?php

define("DSN", "mysql:host=localhost");
define("USERNAME", "root");
define("PASSWORD", "");

try {
    $dbh = new PDO(DSN, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create database if not exists
    $dbh->exec("CREATE DATABASE IF NOT EXISTS rhomax;
                CREATE USER 'USERNAME'@'localhost' IDENTIFIED BY 'PASSWORD';
                GRANT ALL ON rhomax.* TO 'USERNAME'@'localhost';
                FLUSH PRIVILEGES;");

    $dbh->exec("USE rhomax");

    // create tables if not exists
    $dbh->exec("CREATE TABLE IF NOT EXISTS client (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                first_name VARCHAR(100),
                last_name VARCHAR(100),
                email VARCHAR(100),
                contact_number VARCHAR(25),
                best_time_to_call VARCHAR(255),
                UNIQUE KEY unique_email (email))");

    $dbh->exec("CREATE TABLE IF NOT EXISTS property_information (
                client_id INT NOT NULL,
                lot_area VARCHAR(50),
                length VARCHAR(100),
                width VARCHAR(100),
                location_of_property VARCHAR(255),
                img BLOB,
                FOREIGN KEY(client_id) REFERENCES client(id))");

    $dbh->exec("CREATE TABLE IF NOT EXISTS desired_specification (
                client_id INT NOT NULL,
                floor_area VARCHAR(100),
                floor_level INT,
                number_of_rooms INT,
                number_of_toilets INT,
                car_garage INT,
                preffered_design VARCHAR(100),
                preffered_finish VARCHAR(100),
                others VARCHAR(100),
                FOREIGN KEY(client_id) REFERENCES client(id))");

    $dbh->exec("CREATE TABLE IF NOT EXISTS payment_and_construction (
                client_id INT NOT NULL,
                budget INT,
                payment_scheme VARCHAR(25),
                construction_date DATE)");

} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
    exit();
}
