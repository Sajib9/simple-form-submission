# How to Install and Run 

# Installation Instructions

## Required Tech
    1. php 7.4
    2. Jquery 3.5
    3. Xampp server
    4. Bootstrap 3.4
    
## Installation
    1. Go to your htdocs directory of your xampp folder and clone the project from github direcotory to your xampp htdocs 
    directory  using the command git clone https://github.com/Sajib9/simple-form-submission.git for https 
    2. Create a database on your phpmyadmin "buyer_receipt" 
    3. Import the buyer_receipt.sql (it is in the root directory) file into your database.
    4. Set your database credentials in database.php file which is in application/config directory and edit $host, $user, $password and $database with you own credentials:
        private $host = 'localhost';
        private $user = 'root';
        private $password = 'your password';
        private $database = 'database name'; 
    5. Now open your browser and execute the "localhost/project folder name" file which is in your project root directory.     
    
 ## Project features:
    - Maintaining mvc pattern
    - User's browser ip automatically taken when submiting the form
    - Encryption receipt id with proper salt and using sha-512
    - taking local time zone at entry time
    - Back end validation
    - Front end validation
    - Form submission with ajax 
    - Preventing users from multiple submissions within 24 hours using cookie
    - Including ajax search opton with entry_by, from date and to date
    - Integrating the ajax response with resetting the form value   