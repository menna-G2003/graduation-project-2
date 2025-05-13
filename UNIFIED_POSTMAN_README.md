# Real Estate Platform - Unified Postman Files

This document explains the unified Postman collection and environment files that have been created to streamline API testing for the Real Estate Platform.

## Files

- `Real_Estate_Platform_Unified.postman_collection.json` - A comprehensive collection containing all API endpoints
- `Real_Estate_Platform_Unified.postman_environment.json` - A unified environment file with all necessary variables

## Features

These unified files combine features from multiple previously separate Postman files and offer:

1. **Comprehensive API Coverage**
   - Authentication endpoints for both users and admins
   - Admin messaging system endpoints
   - User notification management
   - User-to-user messaging
   - Property listing and management
   - User profile management

2. **Standardized Authentication**
   - Separate tokens for regular users and admin users
   - Automatic token extraction from login responses
   - Token persistence across requests

3. **Clear Organization**
   - Logically grouped endpoints by functionality
   - Consistent naming conventions
   - Detailed request descriptions

4. **Performance Monitoring**
   - Request timestamp tracking
   - Response time validation
   - Automatic error logging

## Usage

### Importing the Files

1. Open Postman
2. Click "Import" in the top left
3. Select the unified collection and environment files
4. Select the "Real Estate Platform - Unified Environment" from the environment dropdown

### Authentication

1. Use "Login User" or "Login Admin" request to authenticate
2. Tokens will be automatically stored in environment variables
3. Subsequent requests will use the appropriate token

### Testing Workflows

#### User Messaging Flow
1. Login as a regular user
2. Send a message using "Send Message"
3. View messages using "Get User Messages"
4. Check specific conversations using "Get Message Thread"

#### Admin Messaging Flow
1. Login as an admin
2. Create an admin message with "Create Admin Message"
3. View all messages with "List Admin Messages"
4. Update or delete messages as needed

#### Notification Testing
1. Login as a regular user
2. View notifications using "Get User Notifications"
3. Mark notifications as read
4. Update notification settings

## Important Variables

The environment includes these key variables:

- `baseUrl` - The base URL for the API
- `userEmail`/`userPassword` - Regular user credentials
- `adminEmail`/`adminPassword` - Admin user credentials
- `userToken`/`adminToken` - Authentication tokens
- `messageId`, `adminMessageId`, `notificationId` - Resource IDs
- Various property/apartment related variables for testing

## Notes

- The collection includes pre-request scripts to set timestamps
- Test scripts automatically validate response times
- All endpoints are documented with descriptions
- Error handling is standardized across all requests 