# Contact Manager REST API (Laravel 12)

This is a Laravel based Contact Manager RESTful API that supports full CRUD operations, API versioning, validation using Form Requests, Repository Pattern, Resource classes for clean API responses, logging middleware, and unit tests.

## Features

- API Versioning (`/api/v1`)
- CRUD operations for contacts
- Request validation using Form Requests
- Repository Pattern for separation of concerns
- API Resource formatting
- Custom logging middleware for incoming requests
- Unit tests
- OpenAPI-style documentation
- Follows SOLID principles
- Clean architecture

---

## Requirements

- PHP 8.2+
- Laravel 12
- Composer
- MySQL
- Postman (for API testing)

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/mansighetiya/contact-manager-api.git
   cd contact-manager-api
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy `.env` file and configure database:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

   The API will now be available at `http://localhost:8000/`

---

## API Endpoints

| Method | Endpoint                 | Description             |
|--------|--------------------------|-------------------------|
| GET    | `/api/v1/contacts`       | List all contacts       |
| GET    | `/api/v1/contacts/{id}`  | Get a single contact    |
| POST   | `/api/v1/contacts`       | Create a new contact    |
| PUT    | `/api/v1/contacts/{id}`  | Update a contact        |
| DELETE | `/api/v1/contacts/{id}`  | Delete a contact        |

---

## Headers Required in Postman

All requests must include the following headers:

| Key              | Value             |
|------------------|-------------------|
| Accept           | application/json  |
| Content-Type     | application/json  |

---

## Sending Data via Postman

### POST: Create Contact

**URL**: `POST /api/v1/contacts`  
**Body (raw JSON):**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "9876543210"
}
```

### PUT: Update Contact

**URL**: `PUT /api/v1/contacts/1`  
**Headers:**
```
Accept: application/json
Content-Type: application/json
```

**Body (raw JSON):**
```json
{
  "name": "John Smith",
  "email": "johnsmith@example.com",
  "phone": "9998887777"
}
```

> Make sure the contact ID exists before sending an update request.

---

## Logging

All incoming requests are logged using `LogRequestMiddleware` located at `App\Http\Middleware\LogRequestMiddleware.php`. Logs can be viewed in `storage/logs/laravel.log`.

---

## Testing

To run unit tests:

```bash
php artisan test
```

Tests are written using Laravel's built-in testing tools and cover both validation and successful cases for contact creation and updates.

---

## Author

Developed by Mansi Ghetiya  
Contact: mansipatel.rk@gmail.com
