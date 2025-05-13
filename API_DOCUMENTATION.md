# API Documentation - Local Development

## Base URL
All API endpoints are accessible from:
```
http://localhost:8000/api
```

# API Documentation

## Messaging API

The Messaging API provides endpoints for sending, receiving, and managing messages between users. All messaging endpoints require authentication.

### Authentication

All API routes require authentication using Laravel Sanctum.
Add the following header to your requests:

```
Authorization: Bearer YOUR_API_TOKEN
```

### Get All Messages

**GET /api/messages**

Returns all messages for the authenticated user.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "sender": {
        "id": 2,
        "name": "Jane Doe",
        "avatar": "path/to/avatar.jpg"
      },
      "receiver": {
        "id": 1,
        "name": "John Doe",
        "avatar": "path/to/avatar.jpg"
      },
      "content": "Message content",
      "read_at": "2025-04-22 15:30:45",
      "created_at": "2025-04-22 15:00:00",
      "updated_at": "2025-04-22 15:30:45"
    }
  ]
}
```

### Get All Conversations

**GET /api/conversations**

Returns all conversations for the authenticated user.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "user": {
        "id": 2,
        "name": "Jane Doe",
        "avatar": "path/to/avatar.jpg"
      },
      "unread_count": 3,
      "last_message_time": "2025-04-22 15:00:00"
    }
  ]
}
```

### Get Conversation with Specific User

**GET /api/conversations/{userId}**

Returns the conversation between the authenticated user and the specified user.

**Response:**
```json
{
  "success": true,
  "data": {
    "messages": [
      {
        "id": 1,
        "sender_id": 1,
        "receiver_id": 2,
        "content": "Message content",
        "read_at": "2025-04-22 15:30:45",
        "created_at": "2025-04-22 15:00:00",
        "updated_at": "2025-04-22 15:30:45"
      }
    ],
    "user": {
      "id": 2,
      "name": "Jane Doe",
      "avatar": "path/to/avatar.jpg"
    }
  }
}
```

### Send Message

**POST /api/messages/{receiverId}**

Sends a message to the specified user.

**Request Body:**
```json
{
  "content": "Message content"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Message sent successfully",
  "data": {
    "id": 1,
    "sender_id": 1,
    "receiver_id": 2,
    "content": "Message content",
    "read_at": null,
    "created_at": "2025-04-22 15:00:00",
    "updated_at": "2025-04-22 15:00:00"
  }
}
```

### Mark Message as Read

**PUT /api/messages/{messageId}/read**

Marks a message as read. The authenticated user must be the receiver of the message.

**Response:**
```json
{
  "success": true,
  "message": "Message marked as read"
}
```

### Delete Message

**DELETE /api/messages/{messageId}**

Deletes a message. The authenticated user must be either the sender or the receiver of the message.
If the user is the sender, they can only delete the message within 24 hours of sending unless they are an admin.

**Response:**
```json
{
  "success": true,
  "message": "Message deleted successfully"
}
```

### Get Unread Message Count

**GET /api/messages/unread-count**

Returns the count of unread messages for the authenticated user and a list of conversations with unread messages.

**Response:**
```json
{
  "success": true,
  "data": {
    "total_unread": 5,
    "unread_conversations": [
      {
        "user_id": 2,
        "name": "Jane Doe",
        "avatar": "path/to/avatar.jpg",
        "count": 3
      },
      {
        "user_id": 3,
        "name": "Bob Smith",
        "avatar": "path/to/avatar.jpg",
        "count": 2
      }
    ]
  }
}
``` 