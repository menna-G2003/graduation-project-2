# API Route List

## Authentication Routes
- `POST /api/register` - Register a new user
- `POST /api/login` - Log in a user
- `POST /api/logout` - Log out the authenticated user (requires auth)
- `POST /api/refresh` - Refresh the authentication token (requires auth)
- `GET /api/user` - Get the authenticated user's details (requires auth)
- `POST /api/forgot-password` - Send a password reset link
- `POST /api/reset-password` - Reset a user's password
- `POST /api/verify-email/{id}/{hash}` - Verify a user's email address
- `POST /api/resend-verification-email` - Resend the email verification link

## Apartment Routes
- `GET /api/apartments` - Get all apartments
- `GET /api/apartments/{apartment}` - Get a specific apartment
- `GET /api/featured-apartments` - Get featured apartments
- `GET /api/search-apartments` - Search apartments
- `POST /api/apartments` - Create a new apartment (requires auth)
- `PUT /api/apartments/{apartment}` - Update an apartment (requires auth)
- `DELETE /api/apartments/{apartment}` - Delete an apartment (requires auth)
- `GET /api/user/apartments` - Get the authenticated user's apartments (requires auth)

## Comment Routes
- `GET /api/apartments/{apartment}/comments` - Get all comments for an apartment
- `GET /api/apartments/{apartment}/comments/{comment}` - Get a specific comment
- `GET /api/apartments/{apartment}/rating` - Get the average rating for an apartment
- `POST /api/apartments/{apartment}/comments` - Create a new comment (requires auth)
- `PUT /api/apartments/{apartment}/comments/{comment}` - Update a comment (requires auth)
- `DELETE /api/apartments/{apartment}/comments/{comment}` - Delete a comment (requires auth)
- `POST /api/apartments/{apartment}/comments/{comment}/report` - Report a comment (requires auth)
- `POST /api/apartments/{apartment}/comments/{comment}/vote` - Vote on a comment (requires auth)
- `POST /api/apartments/{apartment}/comments/{comment}/pin` - Pin a comment (requires auth)

## Favorite Routes
- `GET /api/favorites` - Get the authenticated user's favorite apartments (requires auth)
- `POST /api/favorites` - Add an apartment to favorites (requires auth)
- `DELETE /api/favorites/{apartment}` - Remove an apartment from favorites (requires auth)
- `GET /api/favorites/{apartment}/check` - Check if an apartment is in favorites (requires auth)
- `POST /api/favorites/{listing}/toggle` - Toggle favorite status for an apartment (requires auth)

## Saved Search Routes
- `GET /api/saved-searches` - Get the authenticated user's saved searches (requires auth)
- `POST /api/saved-searches` - Create a new saved search (requires auth)
- `GET /api/saved-searches/{id}` - Get a specific saved search (requires auth)
- `PUT /api/saved-searches/{id}` - Update a saved search (requires auth)
- `DELETE /api/saved-searches/{id}` - Delete a saved search (requires auth)

## Message Routes
- `GET /api/messages` - Get all messages for the authenticated user (requires auth)
- `GET /api/messages/unread-count` - Get the count of unread messages (requires auth)
- `GET /api/conversations` - Get all conversations for the authenticated user (requires auth)
- `GET /api/conversations/{userId}` - Get a conversation with a specific user (requires auth)
- `POST /api/messages/{receiverId}` - Send a message to a user (requires auth)
- `PUT /api/messages/{messageId}/read` - Mark a message as read (requires auth)
- `DELETE /api/messages/{messageId}` - Delete a message (requires auth)

## Booking Routes
- `GET /api/bookings` - Get all bookings for the authenticated user (requires auth)
- `POST /api/bookings/apartments/{apartment}` - Book an appointment (requires auth)
- `GET /api/bookings/apartments/{apartment}/availability` - Get availability for an apartment (requires auth)
- `GET /api/bookings/{booking}` - Get a specific booking (requires auth)
- `PUT /api/bookings/{booking}` - Update a booking (requires auth)
- `DELETE /api/bookings/{booking}` - Cancel a booking (requires auth)
- `PUT /api/bookings/{booking}/confirm` - Confirm a booking (requires auth)
- `PUT /api/bookings/{booking}/reschedule` - Reschedule a booking (requires auth)

## Payment Routes
- `POST /api/payments/intent` - Create a payment intent (requires auth)
- `POST /api/payments/process` - Process a payment (requires auth)
- `GET /api/payments/methods` - Get payment methods (requires auth)
- `POST /api/payments/methods` - Add a payment method (requires auth)
- `DELETE /api/payments/methods/{id}` - Remove a payment method (requires auth)
- `GET /api/payments/transactions` - Get transactions (requires auth)
- `GET /api/payments/transactions/{id}` - Get a specific transaction (requires auth)
- `POST /api/payments/transactions/{id}/refund` - Request a refund (requires auth)
- `GET /api/payments/gateways` - Get available payment gateways (requires auth)

## Notification Routes
- `GET /api/notifications` - Get all notifications for the authenticated user (requires auth)
- `PUT /api/notifications/{id}/read` - Mark a notification as read (requires auth)
- `PUT /api/notifications/read-all` - Mark all notifications as read (requires auth)
- `DELETE /api/notifications/{id}` - Delete a notification (requires auth)
- `GET /api/notifications/settings` - Get notification settings (requires auth)
- `PUT /api/notifications/settings` - Update notification settings (requires auth)
- `POST /api/notifications/subscribe` - Subscribe to a saved search (requires auth)
- `DELETE /api/notifications/unsubscribe/{id}` - Unsubscribe from a saved search (requires auth)

## Admin Routes
All admin routes require authentication and admin role:

- `GET /api/admin/comments/pending` - Get pending comments
- `PUT /api/admin/comments/{comment}/approve` - Approve a comment
- `POST /api/admin/apartments/{apartment}/comments/{comment}/feature` - Feature a comment 