# Messaging API Postman Collection

This repository contains a Postman collection and environment for testing the Messaging API.

## Setup Instructions

1. **Install Postman**
   - Download and install Postman from [https://www.postman.com/downloads/](https://www.postman.com/downloads/)

2. **Import Collection and Environment**
   - Open Postman
   - Click on "Import" button in the top left
   - Select both files:
     - `Messaging_API.postman_collection.json`
     - `Messaging_API.postman_environment.json`

3. **Set Environment**
   - In the top-right corner of Postman, select "Messaging API Environment" from the dropdown

4. **Authentication**
   - Before testing protected endpoints, you need to get a token:
     - Execute the "Login" request in the Auth folder
     - The response will contain a token, which will be automatically set as an environment variable

## Environment Variables

- `base_url`: The base URL of your API (default: http://localhost:8000)
- `token`: Your authentication token (set automatically after login)
- `user_email`: Email for authentication
- `user_password`: Password for authentication
- `receiver_id`: ID of the user to send messages to
- `message_id`: ID of a message for single-message operations
- `user_id`: ID of a user for user-specific operations
- `search_query`: Query string for search operations

## Collection Structure

The collection is organized into the following folders:

### Auth
- Login
- Register
- Logout
- Get Current User

### Messages
- Get All Messages
- Send Message
- Mark Message as Read
- Delete Message
- Get Unread Count

### Conversations
- Get All Conversations
- Get Conversation with User
- Delete Conversation
- Mark Conversation as Read

### Users
- Get All Users
- Get User
- Search Users

## Testing Flow

For a complete testing flow:

1. Register a new user (Auth > Register)
2. Login with credentials (Auth > Login)
3. Get all users to find a user to message (Users > Get All Users)
4. Send a message to another user (Messages > Send Message)
5. Get all conversations (Conversations > Get All Conversations)
6. View the specific conversation (Conversations > Get Conversation with User)
7. Mark messages as read (Messages > Mark Message as Read)

## Notes

- The environment is configured for a local development setup. Adjust the `base_url` as needed.
- The API uses Bearer token authentication. This is handled automatically once you login.
- Error responses will include a `message` field with details about what went wrong. 