# Postman Setup for Local Development

## Quick Start

1. **Start the Laravel server**
   - Double-click the `serve.bat` file in the project root
   - Or run `cd C:\project\New folder\app` then `php artisan serve` in your terminal
   - The server will start at http://localhost:8000

2. **Import Postman files**
   - Open Postman
   - Click "Import" button in the top-left
   - Select these two files:
     - `postman/Real Estate API.postman_collection.json`
     - `postman/Real Estate API.postman_environment.json`

3. **Select the environment**
   - In the top-right corner dropdown, select "Real Estate API Environment"

4. **Automatic token handling**
   - The collection is designed to automatically save authentication tokens
   - When you run Register or Login requests, the token is saved to the environment
   - All authenticated requests will use this token automatically

## Testing the API

1. **Test the API connection**
   - In the "Health Check" folder, run the "Health Check" request
   - You should get a success response with "status: ok" message

2. **User registration and login**
   - In the "Authentication" folder:
     - Run "Register" to create a new user
     - Run "Login" to get a token for an existing user
     - The token will be automatically saved for future requests

3. **Using authenticated endpoints**
   - After login, run "Get User Profile" to retrieve user information
   - This request automatically uses the Bearer token from your environment

## Troubleshooting

- If the server won't start, make sure you're in the `C:\project\New folder\app` directory
- If database errors occur, check that:
  - MySQL is running
  - You've created the database named "realestate"
  - The .env file has the correct MySQL credentials

## Postman Environment Variables

The Real Estate API Environment includes these variables:

| Variable | Purpose |
|----------|---------|
| `base_url` | Set to http://localhost:8000/api - all requests use this |
| `token` | Automatically set after login/register for auth requests |
| `email` | Default test email (admin@example.com) |
| `password` | Default test password (Admin@123) |
| `apartment_id` | Used to store a sample apartment ID for testing |
| `comment_id` | Used to store a sample comment ID for testing |
| `payment_method_id` | Used to store a payment method ID for testing |
| `transaction_id` | Used to store a transaction ID for testing | 