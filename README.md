System Requirements :
To run AVA locally, ensure the following software is installed on your system:
Operating System: Windows 10/11, macOS, or Linux
Web Server: XAMPP, WAMP, or MAMP (for local development)
PHP: Version 7.4 or higher (included in XAMPP/WAMP/MAMP)
Database: MySQL (included in XAMPP/WAMP/MAMP)
Web Browser: Chrome, Firefox, Edge, or Safari (latest versions)
Text Editor: VS Code, Sublime Text, or Atom recommended

Installation Guide : 
1.Install a local server environment:
   1.Download XAMPP from https://www.apachefriends.org
   2.Run the installer and select these components:
     i.Apache
     ii.MySQL
     iii.PHP
     iv.phpMyAdmin (for database management)
2.Install project dependencies (if any):
  1.Clone the git repository : 
    git clone https://github.com/Menodore/AVA.github.io 
    cd ava_final
  2.Move the directory ava_final to C:\xampp\htdocs
3.Install a text editor (if you don't have one):
  Download VS Code from https://code.visualstudio.com

Setup Instructions
 1.Start your local server:
    i.Launch XAMPP Control Panel
    ii.Start Apache and MySQL services
 2.Set up your database:
    i.Access phpMyAdmin at http://localhost/phpmyadmin/
    ii.Create a new database “ava” for the project.
    iii.Create table “users” in  the database “ava”  with the follwoing structure:
        Id: INT(10) - Primary key that automatically increments (unique identifier for each user)
        firstName: VARCHAR(50) - Stores the user's first name (max 50 characters)
        lastName: VARCHAR(50) - Stores the user's last name (max 50 characters)
        email: VARCHAR(50) - Stores the user's email address (max 50 characters)
        password: VARCHAR(50) - Stores the encrypted/hashed user password (max 50 characters)
 3.Configure your project:
    i.Place your project files in the htdocs folder (XAMPP) or www folder (WAMP/MAMP).
    ii.Update database connection settings in your PHP files:
       $host="localhost";
       $user="root";
       $pass="";
       $db="ava";

Quick Start
Access your project:
  Open your browser and navigate to: http://localhost/ava_final

# AVA(old)
Project Website
https://menodore.github.io/AVA.github.io/ava-node/public/
