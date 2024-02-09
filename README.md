Manufaktura Pizzy
-------------------

This project was created as part of the Web Application Programming course, so that's why the language is Polish. It is a system for managing orders in a fictional pizza factory.

### Requirements

To run this project locally, you need to have the following tools installed:

*   [node.js](https://nodejs.org/en)
*   [XAMPP](https://www.apachefriends.org/)
*   [Composer](https://getcomposer.org/)

### Installation Instructions

Clone the project repository to the `htdocs` directory in XAMPP:
    ```
    git clone https://github.com/HPL21/ManufakturaPizzy
    ```
Navigate to the `ManufakturaPizzy` directory:
    ```
    cd ManufakturaPizzy
    ```
Install dependencies using Composer:
    ```
    composer install
    ```
Rename the `.env.example` file to `.env`
    
Start XAMPP and initiate Apache and MySQL.
    
Open phpMyAdmin and create a new database named `manufakturapizzy`.
    
Run database migrations using Artisan:
    ```
    php artisan migrate
    ```
Install JavaScript dependencies using npm:
    ```
    npm install
    ```
Build JavaScript assets:
    ```
    npm run build
    ```
Run the server using Artisan:
    ```
    php artisan serve
    ```
Open a web browser and go to [http://localhost:8000/](http://localhost:8000/), where you can register in the system.
    
To create an admin user, simply change the value of the `is_admin` field in the `users` table in the database to `1`.
    
### Screenshots




### Author

This project was created by [HPL21](https://github.com/HPL21).

### License

This project is licensed under the MIT License.