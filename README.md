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
   composer run setup
   ```

2. **Set up environment**
   ```bash
   cp .env.example .env
   ```

3. **Build assets**
   ```bash
   npm run build
   ```

4. **Create database**
   ```bash
   touch database/database.sqlite
   ```

5. **Seed the database** (optional)
   ```bash
   php artisan migrate:fresh --seed
   ```

## Admin Access

When seeding the database, an admin user will be created to manage all keyboard layouts and comments:

- **Email**: admin@ehb.be
- **Username**: admin
- **Password**: Password!321

Admin users have special permissions:
- Delete any keyboard layout (not just their own)
- Delete any comment (not just their own)

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

## Sources & References

Throughout the development of this project, the following resources were used:

### Laravel Documentation
- [Blade Anonymous Components](https://laravel.com/docs/12.x/blade#anonymous-components) - Used for form components
- [Blade Method Field](https://laravel.com/docs/12.x/blade#method-field) - Used for PUT/PATCH/DELETE forms
- [Laravel Mail & Mailables](https://laravel.com/docs/12.x/mail#generating-mailables) - Contact form email functionality
- [Mail Envelope](https://laravel.com/docs/12.x/mail#using-the-envelope) - Email configuration
- [File Uploads](https://laravel.com/docs/12.x/filesystem#file-uploads) - Image upload handling

### External Resources
- [Mailtrap - Send Email in Laravel](https://mailtrap.io/blog/send-email-in-laravel/) - Email setup guide
- [Kinsta - Laravel Authentication](https://kinsta.com/blog/laravel-authentication/) - Authentication implementation
- [Laracasts - Confirm Delete Alert](https://laracasts.com/discuss/channels/laravel/laravel-confirm-delete-in-an-alert-in-my-view) - Delete confirmation pattern
- [Intelephense Issue #3125](https://github.com/bmewburn/vscode-intelephense/issues/3125) - IDE helper configuration
