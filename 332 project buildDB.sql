use 332Project;
CREATE TABLE Organization ( 
address VARCHAR(40) NOT NULL,
phone_number VARCHAR(15) NOT NULL, 
name VARCHAR(40) NOT NULL, 
/*typeOfOrganization will demonstrate whether it is a rescue organization or SPCA*/
typeOfOrganization VARCHAR(40) NOT NULL, 
PRIMARY KEY(name)
);

CREATE TABLE Shelter ( 
name VARCHAR(40) NOT NULL, 
webURL VARCHAR(30) NOT NULL, 
CAT INT(11) NOT NULL DEFAULT 0, 
DOG INT(11) NOT NULL DEFAULT 0,
RODENT INT(11) NOT NULL DEFAULT 0, 
RABBIT INT(11) NOT NULL DEFAULT 0, 
PRIMARY KEY(name), 
FOREIGN KEY (name) REFERENCES Organization (name) On DELETE CASCADE 
);

CREATE TABLE Employee ( 
employee_name VARCHAR(20) NOT NULL, 
address VARCHAR(40) NOT NULL, 
phone_number VARCHAR(15) NOT NULL, 
location VARCHAR(40) NOT NULL,
/*capacity will demonstrate whether this person is an employee or an owner*/ 
capacity VARCHAR(40) NOT NULL, 
PRIMARY KEY(employee_name), 
FOREIGN KEY (location) REFERENCES Organization(name) ON DELETE CASCADE 
);

CREATE TABLE Driver ( 
name VARCHAR(10) NOT NULL, 
phone_number VARCHAR(15) NOT NULL, 
plate_number VARCHAR(7) NOT NULL, 
driver_number VARCHAR(15) NOT NULL,
organizationName VARCHAR(40) NOT NULL, 
PRIMARY KEY(name), 
FOREIGN KEY(organizationName) REFERENCES Organization (name) ON DELETE CASCADE
);

CREATE TABLE Animal ( 
animal_id INT NOT NULL AUTO_INCREMENT, 
typeOfAnimal VARCHAR(6) NOT NULL, 
location VARCHAR(40) NOT NULL, 
profile VARCHAR(30) NOT NULL, 
origin_date DATETIME NOT NULL,
price INT NOT NULL, 
PRIMARY KEY(animal_id), 
FOREIGN KEY (location) REFERENCES Organization(name) 
);

CREATE TABLE MoneyTransaction (
payment_id VARCHAR(20) NOT NULL, 
payee VARCHAR(15) NOT NULL, 
payer VARCHAR(15) NOT NULL, 
amount INT NOT NULL, 
dateOfTransaction DATETIME NOT NULL, 
/*type of transaction could be movement, adoption or donation*/
typeOfTransaction VARCHAR(15) NOT NULL, 
PRIMARY KEY(payment_id), 
FOREIGN KEY (payee) REFERENCES Organization(name) 
);

CREATE TABLE Movement ( 
payment_id INT AUTO_INCREMENT NOT NULL, 
driver VARCHAR(10) NOT NULL, 
departure VARCHAR(20) NOT NULL, 
destination VARCHAR(20) NOT NULL, 
animal_id INT NOT NULL, 
PRIMARY KEY(payment_id), 
FOREIGN KEY (driver) REFERENCES Driver(name) ON DELETE CASCADE, 
FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) 
);

CREATE TABLE Vet_Visit ( 
case_number INT AUTO_INCREMENT, 
animal_id INT NOT NULL, 
vet_name VARCHAR(30) NOT NULL, 
weight INT NOT NULL, 
conditionOfAnimal VARCHAR(50) NOT NULL, 
dateOfVisit DATETIME NOT NULL, 
PRIMARY KEY(case_number), 
FOREIGN KEY (animal_id) REFERENCES Animal(animal_id) ON DELETE CASCADE 
);

CREATE TABLE AdoptedList ( 
name_adopter VARCHAR(15) NOT NULL,
address VARCHAR(40) NOT NULL, 
phone_number VARCHAR(15) NOT NULL, 
amount INT NOT NULL, 
animal_id INT NOT NULL, 
payment_id VARCHAR(20) NOT NULL, 
PRIMARY KEY(animal_id), 
FOREIGN KEY (animal_id) REFERENCES Animal(animal_id), 
FOREIGN KEY (payment_id) REFERENCES MoneyTransaction(payment_id) 
);