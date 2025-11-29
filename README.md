# 30Keys

A Laravel-based web application for keyboard enthusiasts to browse and share keyboard layouts.

## About

30Keys is a community platform where users can:
- Browse a collection of mechanical keyboards
- View detailed specifications and layouts
- Rate and review keyboards
- Discuss keyboard layouts from one another
- Share their own keyboard builds
- Connect with other keyboard enthusiasts

Built with Laravel 12 and PHP 8.2, this application provides a modern, responsive interface for exploring the world of mechanical keyboards.

## Requirements

- PHP 8.2 or higher
- Composer
- SQLite (included by default)

## Installation

After cloning this repository, follow these steps to get started:

1. **Install dependencies**
   ```bash
   composer install
   ```

2. **Set up environment**
   ```bash
   cp .env.example .env
   ```

3. **Generate application key**
   ```bash
   php artisan key:generate
   ```

4. **Create database**
   ```bash
   touch database/database.sqlite
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the database** (optional)
   ```bash
   php artisan db:seed
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`

## Development

### Running Tests
```bash
php artisan test
```

### Code Style
This project uses Laravel Pint for code formatting:
```bash
./vendor/bin/pint
```

## License

This project is open-sourced software licensed under the MIT license.