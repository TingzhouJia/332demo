/*organization*/
INSERT INTO organization VALUES('101 Johnson St, Ottawa, ON', 6135833333, 'PetsHome', 'SPCA');
INSERT INTO organization VALUES('250 Will St, Toronto, ON', 6135832500, 'AnotherPetsHome', 'SPCA');
INSERT INTO organization VALUES('999 Duncan St, Ottawa, ON', 6134071234, 'Rescuer', 'rescue organization');
INSERT INTO organization VALUES('365 Marquis St, Toronto, ON', 6134526597, 'AnotherRescuer', 'rescue organization');
INSERT INTO organization VALUES('209 Dirk St, Ottawa, ON', 6132581314, 'Shelter', 'shelter');
INSERT INTO organization VALUES('13 Bay St, Toronto, ON', 6134074190, 'AnotherShelter', 'shelter');
/*shelter*/
INSERT INTO shelter VALUES('Shelter','www.shelter.com',10,10,10,10);
INSERT INTO shelter VALUES('AnotherShelter','www.anothershelter.com',15,15,15,15);
/*employee*/
INSERT INTO employee VALUES('Kid', '101 Will St, Ottawa', 6136136133, 'PetsHome', 'employee');
INSERT INTO employee VALUES('David', '330 Division St, Ottawa', 6135834321, 'PetsHome', 'owner');
INSERT INTO employee VALUES('Allen', '852 Heaven St, Toronto', 6135288516, 'AnotherPetsHome', 'employee');
INSERT INTO employee VALUES('Jackson', '123 Cathy St, Toronto', 1323973086, 'AnotherPetsHome', 'owner');
INSERT INTO employee VALUES('Caruso', '4 Laker St, Ottawa', 1323973744, 'Rescuer', 'employee');
INSERT INTO employee VALUES('Howard', '39 Laker St, Ottawa', 1829991172, 'Rescuer', 'owner');
INSERT INTO employee VALUES('Giannis', '34 Bucks St, Toronto', 1527963543, 'AnotherRescuer', 'employee');
INSERT INTO employee VALUES('James', '13 Rockets St, Toronto', 1233214321, 'AnotherRescuer', 'owner');
INSERT INTO employee VALUES('Jokic', '15 Nugget St, Ottawa', 0988900987, 'Shelter', 'employee');
INSERT INTO employee VALUES('Siakam', '43 Raptor St, Ottawa', 6544564567, 'Shelter', 'owner');
INSERT INTO employee VALUES('Kawhi', '2 Clipper St, Toronto', 4322342345, 'AnotherShelter', 'employee');
INSERT INTO employee VALUES('Zion', '1 Pelicans St, Toronto', 1355311357, 'AnotherShelter', 'owner');
/*driver*/
INSERT INTO driver VALUES('Gasol', 6136136983, 'MARC33', 123456, 'Rescuer');
INSERT INTO driver VALUES('Lowry', 6135124321, 'KYLE07', 654321, 'Rescuer');
INSERT INTO driver VALUES('Butler', 6133488516, 'JIMM22', 098765, 'AnotherRescuer');
INSERT INTO driver VALUES('Booker', 1323958086, 'DEVN01', 567890, 'AnotherRescuer');
/*animal*/
INSERT INTO animal VALUES(000000, 'dog', 'PetsHome','pic', '2018-03-30', 100);
INSERT INTO animal VALUES(000000, 'cat', 'AnotherPetsHome','pic', '2018-04-20', 100);
INSERT INTO animal VALUES(000000, 'cat', 'Rescuer','pic', '2018-06-11', 100);
INSERT INTO animal VALUES(000000, 'rabbit', 'AnotherRescuer','pic', '2018-07-02', 80);
INSERT INTO animal VALUES(000000, 'rabbit', 'Shelter', 'pic', '2018-01-25', 80);
INSERT INTO animal VALUES(000000, 'rodent', 'AnotherShelter','pic', '2018-02-28', 110);
/*moneytransaction*/
INSERT INTO moneytransaction VALUES(000000, 'PetsHome', 'Wade', 2000, '2018-08-08', 'Donation');
INSERT INTO moneytransaction VALUES(000000, 'PetsHome', 'Rescuer', 100, '2018-08-09', 'Purchase');
INSERT INTO moneytransaction VALUES(000000, 'Shelter', 'Bosh', 100, '2018-08-09', 'Adoption');
/*movement*/
INSERT INTO movement VALUE(2, 'Gasol', 'PetsHome', 'Rescuer', 3);
/*vet_visit*/
INSERT INTO vet_visit VALUES(000000, 1, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO vet_visit VALUES(000000, 4, 'Nash', 9, 'leg injury', '2018-07-02');
/*adoptedlist*/
INSERT INTO adoptedlist VALUE('Bosh', '4 Heat St, Ottawa', 1984324444, 5, 3);
DELETE FROM animal WHERE animal.animal_id = 5;
DELETE FROM vet_visit WHERE vet_visit.animal_id = 5;
DELETE FROM movement WHERE movement.animal_id = 5;
