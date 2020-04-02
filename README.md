---
typora-root-url: ./img
---

#README

### CISC332 Project

#####Author:  Tingzhou Jia     Gexiao Xu



## Navigation

1. According to different setting for MariaDB, user should setup there database configuration depends on the seeting in their phpAdmin. 

   ```php
   <?php
   $DB_HOST='localhost';
   $DB_USER='root';//the role access the database, default is root
   $DB_PWD='123456'; //password for user, the default password should be null here
   $DB_NAME='332demo'; //change name of database according your setting
   $DB_PORT='3306';
   $DB_TYPE='mysql';
   $DB_CHARSET='utf8';
   
   ```

2. The images url for animals are fetched directly from real SPCA official webseit. Since there exists possibility that images url will be removed or revised, the images might not shown well during the running of project. You are welcome to revise the url of animal image for better user experience.

## Project Structure

###	----Config

##### This directory contains all the configuration file and header files for View layer

###	----Controller

##### This directory contains all  php files are used for CRUD in database, 

###	----css

##### This directory contains all stylesheet for View layer 

###   ----img

###   ----js

###   ----model

##### This directory encapsulates two php PDO, which can avoid redundant code and improve maintainability.

###   ----vendor	

###   ----View

####     ----Adopt.php 

​			-----This page contains a function can search number of  rescued animal  in specific year.

#####    ----adoptAnimal.php

​			-----This page contains three functions ( 

​				1. Check the health situation for specific animal.

​				2. Adopt the animal.

​				3. Move an animal from one location to another location . 			

​			)

####     ----adoption.php

​			-----This page contains four functions (

​				1. All the animal in Ontario SPCA (branches, shelters, and rescues organization).

​				2. Filter animal according to species.

​				3. Filter animal according to rescued year.

​				4. Filter animal according to different location

​	)

####     ----Donate.php

​			-----This page contains a function can donate for different SPCA.

####     ----Donor.php

​			-----This page is used for displaying donor for Ontario SPCA, this page contains three functions (

​				  1. Total amount donated by a donor

​				  2. Amount donated by a donor in specific year.

​				 3. How many person times donated in specific year

​		)

####     ----home.php

​			----This page contains SPCA organization information

####     ----volunteer.php

​			-----This page displays the volunteer information in all SPCA organization, it contains three functions(

​					1. view volunteer as driver, employee, or owner

​					2. show volunteers from specific organization 	

​					)

​		
<<<<<<< HEAD

## User Guide

=======
>>>>>>> fa37ef59c6b96ea826a8b33587358dd0dd7c0ad7
