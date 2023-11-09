# Web-Based Assessment Tool 
```
TODO: Add App Definition
```

## Getting Started

### Requirements

- [PHP](https://www.php.net/downloads) >= 8.0
- [Composer](https://getcomposer.org/download/) >= 2.3.10
- [Laravel](https://laravel.com/docs/8.x/installation) >= 8.8x
- [MySQL](https://dev.mysql.com/downloads/mysql/) >= 8.0.x

#### Optional
- [Ubuntu Server](https://ubuntu.com/download/server) >= 18.04 LTS; the production of this app running on Ubuntu based server
- [Nginx](https://ubuntu.com/tutorials/install-and-configure-nginx#1-overview) == latest;

more details about dependencies see [composer.json](https://github.com/Telyu-SI/assessment2020/blob/master/composer.json) and/or [composer.lock &rarr;](https://github.com/Telyu-SI/assessment2020/blob/master/composer.lock)

---

## Run The Application on Your Development Machine

1. Clone this project app repository
```sh
git clone https://github.com/Telyu-SI/assessment2020.git
```

2. Move to the project app directory `assessment2020/`.
```sh
cd assessment2020/
```

3. Install or update the app dependecies on your machine
```sh
composer install
```

```sh
composer update
```

4. Copy or rename file `.env.example` to `.env`. Then edit the `.env` to your desire database credentials or your desire configurations.

5. Finally, run the application
```sh
php artisan key:generate
php artisan serve
```

As default the app will be running on <http://localhost:8000>.

---

## Database Configuration (MySQL)
1. First please create new database on your machine, e.g.
```sh
CREATE DATABASE assessment2020;
```

2. Import the sql file that has been provided to the database
```sh
mysql -u (username) -p assessment2020 < dump20220328_assessment2020.sql
```

3. Set the database configuration that is in the `.env` file
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=assessment2020
DB_USERNAME=root
DB_PASSWORD=YOUR_MYSQL_DB_PASSWORD
```

## Contributing
If you have a suggestion that would make this better, please clone/fork the repo and create a pull request.

1. Clone/Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request
