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

    git clone https://github.com/HPL21/ManufakturaPizzy

Navigate to the `ManufakturaPizzy` directory:

    cd ManufakturaPizzy

Install dependencies using Composer:

    composer install

Rename the `.env.example` file to `.env`
    
[![image.png](https://i.postimg.cc/tTw0zjCw/image.png)](https://postimg.cc/62r19FZf)

Start XAMPP and initiate Apache and MySQL.

[![image.png](https://i.postimg.cc/wTkfqzYz/image.png)](https://postimg.cc/566qgZtK)
    
Open phpMyAdmin and create a new database named `manufakturapizzy`.

[![image.png](https://i.postimg.cc/g0xNH6Xc/image.png)](https://postimg.cc/f3hcwyf1)
    
Run database migrations using Artisan:

    php artisan migrate

Install JavaScript dependencies using npm:
    
    npm install

Build JavaScript assets:

    npm run build

Run the server using Artisan:

    php artisan serve

Open a web browser and go to [http://localhost:8000/](http://localhost:8000/), where you can register in the system.

[![image.png](https://i.postimg.cc/hv2dYp6k/image.png)](https://postimg.cc/hQ7vzbSs)
    
To create an admin user, simply change the value of the `is_admin` field in the `users` table in the database to `1`.

[![image.png](https://i.postimg.cc/V6j9K9Yw/image.png)](https://postimg.cc/XGYyJCG1)
    
### Screenshots

__Landing page:__

[![image.png](https://i.postimg.cc/cLgnD7mz/image.png)](https://postimg.cc/21YyyZgd)

__Order placement:__

[![image.png](https://i.postimg.cc/RhY0f8jZ/image.png)](https://postimg.cc/FkjmXPrM)

__Order summary:__

[![image.png](https://i.postimg.cc/hvXDSsfW/image.png)](https://postimg.cc/n9tb2v40)

__Admin panel:__

[![image.png](https://i.postimg.cc/C5n0yKQw/image.png)](https://postimg.cc/XBWmdnWP)

### License

This project is licensed under the MIT License.