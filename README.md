

# CISC332 Demo

### Technology Stack
- PHP

##### Author:  
- [Tingzhou Jia](https://github.com/TingzhouJia)    
- [Gexiao Xu](https://github.com/JarvisGexiaoXu)



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

## User Guide

### adoptAnimal Page
##### you are able to make three manipulation including adopt it, check health condition and move it from spca to shelter or rescue organization
![image](https://github.com/TingzhouJia/332demo/raw/master/img/adoptAnimal1.png)

![image](https://github.com/TingzhouJia/332demo/raw/master/img/adoptAnimal2.png)
![image](https://github.com/TingzhouJia/332demo/raw/master/img/adoptAnimal3.png)
##### you are allowed to pick a specific driver to move animal 
![image](https://github.com/TingzhouJia/332demo/raw/master/img/adoptAnimal4.png)

### adoption Page
![image](https://github.com/TingzhouJia/332demo/raw/master/img/adoption.png)
##### you are allowed to filter the animal type, location for animal, year rescued of animal

### donate Page
![image](https://github.com/TingzhouJia/332demo/raw/master/img/donate1.png)
##### you can donate monthly 
![image](https://github.com/TingzhouJia/332demo/raw/master/img/donate2.png)
##### you can choose how much you decided to donate

### donor Page
![image](https://github.com/TingzhouJia/332demo/raw/master/img/donor1.png)
##### you can filter donation for specific year, total year donation for specific spca, a donor's total money donated for specific year and its details.

![image](https://github.com/TingzhouJia/332demo/raw/master/img/donor2.png)
##### you are able to filter the donation to specific organization

### home Page
![image](https://github.com/TingzhouJia/332demo/raw/master/img/home1.png)
##### there are three options for user, you can jump to volunteer page, adoption page, and donate page by clicking the yellow button
![image](https://github.com/TingzhouJia/332demo/raw/master/img/home2.png)
##### There is a list of organizations of spca, and their details can be found by accessing ReadMore>>

### volunteer Page
![image](https://github.com/TingzhouJia/332demo/raw/master/img/volunteer.png)
##### this page shows the employee for different organization, and users are allowed to filter employee type and spca type by clicking the select
