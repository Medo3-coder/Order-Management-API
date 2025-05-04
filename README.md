# Order Management API Documentation

Welcome to the Order Management API project! This document provides step-by-step instructions to set up, run, and use the API built with Laravel. It also includes details on the project structure, testing, and potential improvements.

## Table of Contents
- [Overview](#overview)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Running the Project](#running-the-project)
- [API Endpoints](#api-endpoints)
- [Seeding the Database](#seeding-the-database)
- [Testing the API](#testing-the-api)
- [Using Postman](#using-postman)
- [Project Structure](#project-structure)
- [Bonus Features](#bonus-features)
- [Scaling Considerations](#scaling-considerations)
- [Improvements and Future Work](#improvements-and-future-work)
- [Contributing](#contributing)
- [License](#license)

## Overview
This is a simple Order Management API built using Laravel 10. It manages `Customer` and `Order` data with CRUD operations and basic analytics. The API was developed as part of a candidate task, leveraging AI tools for efficiency.

## Prerequisites
Before running the project, ensure you have the following installed:
- **PHP** (>= 8.1)
- **Composer** (https://getcomposer.org/)
- **Node.js** and **NPM** (optional, for frontend if added later)
- A database (e.g., SQLite, MySQL)
- **Postman** or similar API testing tool (optional)

## Installation
Follow these steps to set up the project locally:

1. **Clone the Repository**
   ```bash
   git clone <your-repo-url>
   cd order-management-api
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Configure the Environment**
   ```bash
   cp .env.example .env
   ```
   Update `.env`:
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database/database.sqlite
   ```

4. **Generate App Key & Migrate**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

## Running the Project
```bash
php artisan serve
```
API available at: `http://localhost:8000`

## API Endpoints

### POST /orders
Create a new order:
```json
{
    "customer_id": 1,
    "product_name": "Laptop",
    "quantity": 2,
    "price": 1500.50
}
```

### GET /orders
List orders (filter by `status` optional): `?status=pending`

### PUT /orders/{id}
Update an order’s status:
```json
{
    "status": "shipped"
}
```

### GET /orders/stats
Returns:
```json
{
    "total_revenue": 2800.48,
    "orders_per_status": {
        "pending": 2,
        "shipped": 1
    }
}
```

## Seeding the Database
```bash
php artisan db:seed
```

## Testing the API
Manual: Postman or cURL  
Automated (optional):
```bash
php artisan test
```

## Using Postman
- Open Postman > New Request
- Method: GET, URL: `http://localhost:8000/api/orders/stats`
- Click **Send**

## Project Structure

```
order-management-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── OrderController.php
│   │   └── Requests/
│   │       └── StoreOrderRequest.php
│   └── Models/
│       ├── Customer.php
│       └── Order.php
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
└── .env
```

## Bonus Features
- Filter orders by status
- `stats` endpoint for analytics

## Scaling Considerations
- Use queues for background processing
- Use Redis for caching

## Improvements and Future Work
- Add authentication (e.g., Laravel Sanctum)
- Add automated testing
- Improve validation and error handling

## Contributing
Feel free to fork and submit PRs. Follow PSR-12 coding standards.

## License
MIT License. See LICENSE file.
