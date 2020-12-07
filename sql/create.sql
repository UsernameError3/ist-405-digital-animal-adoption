
/*****************************************************************************
Title:  	Digital Animal Adoption
Use:     	Final Project
Author:  	Alex Fleming
School:  	Southern Illinois University
Term:    	Fall 2020
Developed:  11/29/20
Developed:  11/29/20

Test: mysql -u root -p bikeshop < 'path/to/create.sql'

******************************************************************************/

USE animals;

/* Create Table */
CREATE TABLE available_animals
(
    animal_id int NOT NULL AUTO_INCREMENT,
    animal_name varchar(15),
    animal_color varchar(15),
    animal_type varchar(15),
    animal_health_issues boolean,
    animal_neutered boolean,
    animal_microchip boolean,
    PRIMARY KEY (animal_id)
);

/* Insert data into Table */
INSERT INTO available_animals (animal_name, animal_color, animal_type, animal_health_issues, animal_neutered, animal_microchip)
VALUES 
    ('Henry', 'Brown', 'Cat', false, false, true),
    ('Billy', 'White', 'Cat', false, true, true),
    ('Jane', 'Gray', 'Cat', false, true, true),
    ('Alice', 'Black', 'Dog', false, true, true),
    ('Alex', 'Calico', 'Cat', false, true, true),
    ('David', 'Brown', 'Dog', true, true, false),
    ('Michael', 'Tan', 'Dog', false, false, true),
    ('Jimmy', 'Silver', 'Cat', false, true, true),
    ('Amy', 'Orange', 'Cat', false, true, true),
    ('Allen', 'Calico', 'Cat', true, true, false);



/* Create Table */
CREATE TABLE donation_queue
(
    donation_id int NOT NULL AUTO_INCREMENT,
    animal_name varchar(15),
    animal_color varchar(15),
    animal_type varchar(15),
    animal_health_issues boolean,
    animal_neutered boolean,
    animal_microchip boolean,
    phone varchar(15),
    email varchar(50),
    PRIMARY KEY (donation_id)
);


/* Insert data into Table */
INSERT INTO donation_queue (animal_name, animal_color, animal_type, animal_health_issues, animal_neutered, animal_microchip, phone, email)
VALUES 
    ('Henry', 'Brown', 'Cat', false, false, true,'123-456-7890','city_of_example@localgov.com'),
    ('Billy', 'White', 'Cat', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('Jane', 'Gray', 'Cat', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('Alice', 'Black', 'Dog', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('Alex', 'Calico', 'Cat', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('David', 'Brown', 'Dog', true, true, false,'123-456-7890','city_of_example@localgov.com'),
    ('Michael', 'Tan', 'Dog', false, false, true,'123-456-7890','city_of_example@localgov.com'),
    ('Jimmy', 'Silver', 'Cat', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('Amy', 'Orange', 'Cat', false, true, true,'123-456-7890','city_of_example@localgov.com'),
    ('Allen', 'Calico', 'Cat', true, true, false,'123-456-7890','city_of_example@localgov.com');
