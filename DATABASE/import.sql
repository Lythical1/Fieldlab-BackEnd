DROP DATABASE IF EXISTS `stay_nl`;

CREATE DATABASE `stay_nl`;

USE `stay_nl`;

CREATE TABLE `managers` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(50) NOT NULL
);

CREATE TABLE `properties` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    rating INT NOT NULL,
    description TEXT NOT NULL,
    availability BOOLEAN NOT NULL,
    price INT NOT NULL,
    location VARCHAR(250) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    manager_id INT NOT NULL,
    FOREIGN KEY (manager_id) REFERENCES managers(id)
);

CREATE TABLE `customers` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    email VARCHAR(100) NOT NULL,
    property_id INT NOT NULL,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);

CREATE TABLE `reservations` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    property_id INT NOT NULL,
    manager_id INT NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (property_id) REFERENCES properties(id),
    FOREIGN KEY (manager_id) REFERENCES managers(id)
);
