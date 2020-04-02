use 332demo;
-- organization
INSERT INTO Organization VALUES('101 Johnson St, Ottawa, ON', 6135833333, 'PetsHome', 'SPCA');
INSERT INTO Organization VALUES('250 Will St, Toronto, ON', 6135832500, 'AnotherPetsHome', 'SPCA');
INSERT INTO Organization VALUES('999 Duncan St, Ottawa, ON', 6134071234, 'Rescuer', 'rescue organization');
INSERT INTO Organization VALUES('365 Marquis St, Toronto, ON', 6134526597, 'AnotherRescuer', 'rescue organization');
INSERT INTO Organization VALUES('209 Dirk St, Ottawa, ON', 6132581314, 'Shelter', 'shelter');
INSERT INTO Organization VALUES('13 Bay St, Toronto, ON', 6134074190, 'AnotherShelter', 'shelter');
-- shelter
INSERT INTO Shelter VALUES('Shelter','www.shelter.com',10,10,10,10);
INSERT INTO Shelter VALUES('AnotherShelter','www.anothershelter.com',15,15,15,15);
-- employee
INSERT INTO Employee VALUES('Kid', '101 Will St, Ottawa', 6136136133, 'PetsHome', 'employee');
INSERT INTO Employee VALUES('David', '330 Division St, Ottawa', 6135834321, 'PetsHome', 'owner');
INSERT INTO Employee VALUES('Allen', '852 Heaven St, Toronto', 6135288516, 'AnotherPetsHome', 'employee');
INSERT INTO Employee VALUES('Jackson', '123 Cathy St, Toronto', 1323973086, 'AnotherPetsHome', 'owner');
INSERT INTO Employee VALUES('Caruso', '4 Laker St, Ottawa', 1323973744, 'Rescuer', 'employee');
INSERT INTO Employee VALUES('Howard', '39 Laker St, Ottawa', 1829991172, 'Rescuer', 'owner');
INSERT INTO Employee VALUES('Giannis', '34 Bucks St, Toronto', 1527963543, 'AnotherRescuer', 'employee');
INSERT INTO Employee VALUES('James', '13 Rockets St, Toronto', 1233214321, 'AnotherRescuer', 'owner');
INSERT INTO Employee VALUES('Jokic', '15 Nugget St, Ottawa', 0988900987, 'Shelter', 'employee');
INSERT INTO Employee VALUES('Siakam', '43 Raptor St, Ottawa', 6544564567, 'Shelter', 'owner');
INSERT INTO Employee VALUES('Kawhi', '2 Clipper St, Toronto', 4322342345, 'AnotherShelter', 'employee');
INSERT INTO Employee VALUES('Zion', '1 Pelicans St, Toronto', 1355311357, 'AnotherShelter', 'owner');
-- driver
INSERT INTO Driver VALUES('Gasol', 6136136983, 'MARC33', 123456, 'Rescuer');
INSERT INTO Driver VALUES('Lowry', 6135124321, 'KYLE07', 654321, 'Rescuer');
INSERT INTO Driver VALUES('Butler', 6133488516, 'JIMM22', 098765, 'AnotherRescuer');
INSERT INTO Driver VALUES('Booker', 1323958086, 'DEVN01', 567890, 'AnotherRescuer');
-- animal
INSERT INTO Animal VALUES('1', 'dog', 'PetsHome','https://ospca-mym-prod.imgix.net/images/photos/animals/225355/151387.jpg', '2018-03-30', 100);
INSERT INTO Animal VALUES('2', 'cat', 'AnotherPetsHome','https://ospca-mym-prod.imgix.net/images/photos/animals/225474/152452.jpg', '2018-04-20', 100);
INSERT INTO Animal VALUES('3', 'cat', 'Rescuer','https://ospca-mym-prod.imgix.net/images/photos/animals/225560/152518.jpg', '2018-06-11', 100);
INSERT INTO Animal VALUES('4', 'rabbit', 'Shelter','https://ospca-mym-prod.imgix.net/images/photos/animals/225227/151272.jpg', '2018-07-02', 80);
INSERT INTO Animal VALUES('5', 'rabbit', 'AnotherShelter', 'https://ospca-mym-prod.imgix.net/images/photos/animals/225695/152742.jpg', '2018-01-25', 80);
INSERT INTO Animal VALUES('6', 'rodent', 'Rescuer','https://ospca-mym-prod.imgix.net/images/photos/animals/225694/152741.jpg', '2018-02-28', 110);
-- moneytransaction
INSERT INTO `MoneyTransaction` (`payment_id`, `payee`, `payer`, `amount`, `dateOfTransaction`, `typeOfTransaction`) VALUES
('1', 'AnotherRescuer', 'Tingzhou Jia', 1000, '2020-03-03 00:00:00', 'Donation'),
('2', 'Rescuer', 'Tingzhou Jia', 500, '2020-03-03 00:00:00', 'Donation'),
('3', 'AnotherPetsHome', 'Jarvis Xu', 1000, '2020-03-04 00:00:00', 'Donation'),
('4', 'PetsHome', 'Shelter', 100, '2018-08-09 00:00:00', 'Purchase'),
('5', 'AnotherPetsHome', 'AnotherShelter', 175, '2019-07-13 00:00:00', 'Purchase'),
('6', 'PetsHome', 'Rescuer', 430, '2017-05-12 00:00:00', 'Purchase');

INSERT INTO `Movement` VALUE('6', 'Gasol', 'PetsHome', 'Rescuer', 3);
INSERT INTO `Movement`(`payment_id`, `driver`, `departure`, `destination`, `animal_id`) VALUES ('4','Butler','PetsHome','Shelter',2);
INSERT INTO `Movement`(`payment_id`, `driver`, `departure`, `destination`, `animal_id`) VALUES ('5','Butler','AnotherPetsHome','AnotherShelter',5);


INSERT INTO Vet_Visit VALUES(000001, 1, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO Vet_Visit VALUES(000002, 1, 'Nash', 9, 'leg injury', '2018-07-02');
INSERT INTO Vet_Visit VALUES(000003, 1, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO Vet_Visit VALUES(000004, 2, 'Nash', 9, 'good condition', '2018-07-02');
INSERT INTO Vet_Visit VALUES(000005, 2, 'Ginobili', 10, 'eat too much', '2018-07-12');
INSERT INTO Vet_Visit VALUES(000006, 3, 'Nash', 9, 'leg injury', '2018-07-02');
INSERT INTO Vet_Visit VALUES(0000011, 3, 'Nash', 9, 'leg injury', '2018-08-02');
INSERT INTO Vet_Visit VALUES(000007, 4, 'Ginobili', 10, 'eat too much', '2018-06-15');
INSERT INTO Vet_Visit VALUES(000008, 4, 'Nash', 9, 'leg injury', '2018-07-02');
INSERT INTO Vet_Visit VALUES(000009, 5, 'Ginobili', 10, 'good conditon', '2018-04-10');
INSERT INTO Vet_Visit VALUES(0000012, 5, 'Ginobili', 10, 'good condition', '2018-06-10');
INSERT INTO Vet_Visit VALUES(0000013, 6, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO Vet_Visit VALUES(0000014, 6, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO Vet_Visit VALUES(0000015, 6, 'Ginobili', 10, 'eat too much', '2018-04-10');
INSERT INTO Vet_Visit VALUES(0000010, 4, 'Nash', 9, 'leg injury', '2018-07-02');


