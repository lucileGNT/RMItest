#RMItest
=======

To install the project

- Clone this repository

- Create a MySQL database called "rmitest" and update the config file app/config/parameters.yml (rename parameters.yml.dist file to parameters.yml)

- Launch "php bin/console doctrine:migrations:migrate" in order to create the database and a default user (login : "user" password : "user")

- Launch "composer update" command line

- Launch PHP/MySQL servers and go to http://127.0.0.1:8000/ : it should work!

- Unit test is on this file src/AppBundle/Tests/Controller/BudgetInitiativeControllerTest.php