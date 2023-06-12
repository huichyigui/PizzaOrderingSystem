<h3>To whom it may concern: </h3>
<h3>Please follow these steps carefully to implement all the necessary software to deploy our project.</h3>

Installing PHP 8.1.6
------------------------------
1. Download PHP 8.1.6 source file from the link below:
(https://windows.php.net/download#php-8.1)
2. Extract the file and rename it to "php"
3. Move the file to C:\.
4. Search for “Edit the system environment variables” via windows search engine.
5. Click on Environmental Variables…
6. Click on Path in System variables
7. Click on New then enter "C:\php".
8. Move up the path to the top of the list.

Installing XAMPP
-----------------------------
1. Download XAMPP from this link for PHP 8.1.6.
(https://www.apachefriends.org/download.html)
2. Make sure to download the version that matches your operating system.
3. Once finished downloading, install into the default path provided by the installer.

Installing Composer
------------------------------
1. Download Composer from this link.
(https://getcomposer.org/Composer-Setup.exe)
2. Run the installation.

Installing Laravel Framework
-------------------------------------------
1. Open command prompt.
2. Copy and paste then run  “composer global require laravel/installer”.

Verifying Laravel Framework Version and PHP Version
-------------------------------------------------------------------------------
1. Open command prompt copy and paste then run “php -v”.
2. Open command prompt copy and paste then run “laravel --version”
3. Make sure both of these commands return their version. If errors exist, please go through the installation again.

Creating a Database
----------------------------------
1. Run XAMPP, turn on Apache and MySQL by clicking both of their start buttons.
2. Create a database in mysql by going to the link below.
(http://localhost/phpmyadmin/)
3. Click on "new" at the sidebar on the left.
4. Enter "pizzaordering" in the "Database name" input field.
5. Click Create.

Deploying TapNGo Pizza
----------------------------------------
1. Move the file "pizzaordersystem" to this path "C:\xampp\htdocs\".
2. Run XAMPP, turn on Apache and MySQL by clicking both of their start buttons.
3. Once done moving, open a terminal window on that file by Shift + Right Click then click on Open Powershell window here.
4. Make sure database is created, refer to [Create a Database] if haven't create.
5. Run the following command on the terminal “php artisan migrate --seed”.
6. Once complete, run the following command to deploy the project “php artisan serve”.
7. Run this code in your browser to launch the project “http://127.0.0.1:8000”.

Test Web Services
-------------------------------
1. Move the file "WebServiceTest" to this path "C:\xampp\htdocs\".
2. Run XAMPP, turn on Apache and MySQL by clicking both of their start buttons.
3. Locate this path in your browser to launch the Test Webservice website “http://localhost/WebServiceTest/index.php”.

Dummy Account:

-Customer:
Name	:anna@gmail.com
PW	:anna1234!

-Admin:
Name	:taylor@gmail.com
PW	:tehh1234!
