# Stock Management System

## About The Project

Stock Management System is a web-based application built with Laravel that helps businesses manage their inventory, track stock levels, and handle product management efficiently. This system provides an intuitive interface for managing products, categories, suppliers, and stock movements.

## Features

- Product Management (Add, Edit, Delete products)
- Category Management
- Stock Level Tracking
- Stock Movement History
- Reports Generation
- Dashboard with Key Metrics

## Tech Stack

- **PHP**: ^8.1
- **Laravel**: ^10.0
- **Database**: MySQL
- **Frontend**: 

## Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

## Installation

1. Clone the repository
```bash
git clone [repository-url]
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM dependencies
```bash
npm install
```

4. Create a copy of .env file
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Configure your database in .env file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations
```bash
php artisan migrate
```

8. Start the local development server
```bash
php artisan serve
```

## Usage

1. Access the application at `http://localhost:8000`
2. Login with your credentials
3. Navigate through the dashboard to manage:
   - Products
   - Categories
   - Stock levels
   - Users
   - Reports

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

<!-- ## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details. -->

## Contact

Your Name - [aimefils173@gmail.com]

Project Link: [https://github.com/byiringiroaimefils/stock-management]
