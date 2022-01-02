# D4S Test

Laravel CRUD blog app.

## Installation

- Open XAMPP control panel and start Apache and MySQL.

- Open [Link to phpmyadmin](http://localhost/phpmyadmin) and create a database named 'laravel'. Note that it should be served on port **3306**. Change it accordingly in the .env file if needed.

- Migrate the database.

```bash
php artisan migrate
```

- Seed the database with initial values.

```bash
php artisan db:seed
```

- Start the application. Once it's built, the app will be served on port **8000**.

```bash
php artisan serve
```