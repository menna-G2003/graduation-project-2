# Real Estate Platform API

This is the backend API for the Real Estate Platform, providing endpoints for managing properties, users, messages, and more.

## Setup Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher
- Node.js and npm (for frontend)

### Installation Steps

1. Clone the repository:
   ```
   git clone [repository-url]
   cd [project-directory]
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Copy the example environment file and modify as needed:
   ```
   cp .env.example .env
   ```

4. Generate application key:
   ```
   php artisan key:generate
   ```

5. Update the database configuration in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=real_estate_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run the setup script to create database tables, seed data, and set up storage:
   ```
   chmod +x setup.sh
   ./setup.sh
   ```
   
   Alternatively, you can run these commands individually:
   ```
   php artisan migrate
   php artisan db:seed
   php artisan setup:storage
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

### API Documentation

API documentation is available in Postman format. Import the following files into Postman:

- `postman/Real_Estate_Platform.postman_collection.json` - Main API collection
- `postman/Real_Estate_Platform_Unified.postman_environment.json` - Environment variables

### Test Accounts

The database seeder creates the following test accounts:

1. **Admin User**
   - Email: admin@example.com
   - Password: Admin@123
   - Admin Code: 2000

2. **Property Manager**
   - Email: manager@example.com
   - Password: Manager@123

3. **Regular User**
   - Email: user@example.com
   - Password: User@123

4. **Content Editor**
   - Email: editor@example.com
   - Password: Editor@123

5. **Support Staff**
   - Email: support@example.com
   - Password: Support@123

## Admin Registration

To register a new admin user, use the `Register Complete` endpoint with the following requirements:
- Set `role_id` to `1`
- Include `admin_code` with the value `2000`

## File Storage

User uploads are stored in the following directories:
- Profile photos: `storage/app/public/users/profiles/{user_id}`
- ID documents: `storage/app/public/users/documents/{user_id}`
- Apartment images: `storage/app/public/apartments/images/{apartment_id}`

## License

[Your license information here] 