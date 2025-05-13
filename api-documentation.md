# API Documentation - Local Development

## Base URL
All API endpoints are accessible from:
```
http://localhost:8000/api
```

# API Documentation

## Authentication

All API routes except public routes require authentication using Laravel Sanctum.
Add the following header to your requests:

```
Authorization: Bearer YOUR_API_TOKEN
```

## Messaging Endpoints

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
    "created_at": "2025-04-22 15:00:00",
    "updated_at": "2025-04-22 15:00:00"
  }
}
```

### Mark Message as Read
**PUT /api/messages/{messageId}/read**

Marks a message as read.

**Response:**
```json
{
  "success": true,
  "message": "Message marked as read"
}
```

### Delete Message
**DELETE /api/messages/{messageId}**

Deletes a message. Users can only delete messages they have sent or received.
Sent messages can only be deleted within 24 hours unless the user is an admin.

**Response:**
```json
{
  "success": true,
  "message": "Message deleted successfully"
}
```

### Get Unread Message Count
**GET /api/messages/unread-count**

Returns the count of unread messages for the authenticated user.

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