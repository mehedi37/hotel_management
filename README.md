# Hotel Management System
A [PHP](https://www.php.net/) based hotel room management system with secure authentication and CRUD operations.


### Features
- Admin Authentication System
- Room Management (CRUD Operations)
- Secure Session Management
- CSRF Protection
- Responsive Bootstrap UI
- Input Validation
- Activity Logging

### Pre-requisites
- PHP 7.4+
- MySQL/MariaDB
- Apache Web Server (XAMPP for Windows)

### Installation
1. Clone the repository
```bash
git clone https://github.com/yourusername/hotel_management.git
cd hotel-management-system
```

2. Import the database schema
```SQL
CREATE DATABASE hotel_management;
USE hotel_management;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM('Available', 'Occupied') NOT NULL
);

CREATE TABLE AdminUsers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Update database configuration in [dbconnect.php](http://):
```php
<?php
private $host = 'localhost';
private $db_name = 'hotel_management';
private $username = 'your_username';
private $password = 'your_password';
```

4. Create necessary directories:
```bash
mkdir logs
chmod 777 logs
```

5. Configure your web server to point to the [public](http://) directory.

## Adding Admin Users

### Method 1: Using SQL
```SQL
INSERT INTO AdminUsers (username, password)
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
-- Default password: admin123
```

### Method 2: Using API
```bash
curl -X POST http://yourdomain.com/hotel_management/public/api/add_admin.php -d "secret=007tOPVictoriasSecret&username=admin&password=admin123"
```

## Project Structure
```bash
hotel_management/
├── app/
│   ├── controllers/       # Application controllers
│   ├── models/           # Database models
│   ├── utils/            # Utility classes
│   └── views/            # View templates
├── config/               # Configuration files
├── public/              # Public directory
│   ├── api/             # API endpoints
│   ├── css/             # Stylesheets
│   └── js/              # JavaScript files
└── logs/                # Application logs
```

## Security Features
- Password Hashing using **`password_hash()`**
- CSRF Protection
- SQL Injection Prevention using PDO
- XSS Protection
- Session Management
- Input Validation
- Secure Password Storage

## Author
<div align="center">
  <img src="https://avatars.githubusercontent.com/u/41261534?s=400&u=917446fd6f90811cd8cf236d4b6f8f19067865b9&v=4" width="150" alt="Author Image">

  [MD. Mehedi Hasan Maruf](https://github.com/mehedi37)
</div>