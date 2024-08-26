# Laravel Sanctum API Project

This project is a Laravel-based RESTful API that uses Sanctum for authentication. It provides user registration, login, and CRUD operations for articles. The API endpoints are designed to be secure, requiring an API token for all actions after login.

Installation Instructions
1. Download and Unzip the Project
Download the project ZIP file and unzip it into the htdocs folder of your local web server (e.g., XAMPP, WAMP).
2. Create the Database
Open your web browser and navigate to http://localhost/phpmyadmin.
Create a new database with the name laravelapicrud.
3. Configure the .env File
Open the project folder and locate the .env file.
Update the following lines to match your database credentials:
Installation Instructions
1. Download and Unzip the Project
Download the project ZIP file and unzip it into the htdocs folder of your local web server (e.g., XAMPP, WAMP).
2. Create the Database
Open your web browser and navigate to http://localhost/phpmyadmin.
Create a new database with the name laravelapicrud.
3. Configure the .env File
Open the project folder and locate the .env file.
Update the following lines to match your database credentials:
Replace your_db_username and your_db_password with your actual MySQL credentials.
4. Install Dependencies
Open a terminal and navigate to the project directory.
Run the following command to install the required PHP packages:
composer install
5. Run Migrations
Run the following command in the terminal to create the necessary database tables:
php artisan migrate
6. Serve the Application
Start the Laravel development server by running:
php artisan serve
The application will be accessible at http://localhost:8000.


## Features

- **User Registration:** Allows users to register with their name, email, password, and confirm password.
- **User Login:** Users can log in and receive an API token that will be used for authentication in subsequent requests.
- **Article Management:** Authenticated users can create, update, retrieve, and delete articles.



### Open Postman and hit the api's by given the below documentation

## API Endpoints

### User Authentication

- **Register a new user**


**Request Body:**
```json
{
  "name": "Your Name",
  "email": "your-email@example.com",
  "password": "your-password",
  "c_password": "confirm-password"
}

**Response:**
```json
{
  "success" : true,
  "message" : "User Register Successfully"
}

Login and receive an API token

POST /api/login

Request Body:

{
  "email": "your-email@example.com",
  "password": "your-password"
}

Response:
{
  "success": true,
  "data": {
    "token": "your-api-token",
    "name": "Your Name"
  },
  "message": "User logged in successfully."
}

Article Management

Create a new article

POST /api/articles

Headers:

Authorization: Bearer your-api-token

Request Body:
{
  "title": "Article Title",
  "content": "Article content here..."
}
Response:
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Article Title",
    "content": "Article content here...",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  "message": "Article created successfully."
}


Edit an article

PUT /api/articles/{id}

Headers:
Authorization: Bearer your-api-token

Request Body:
{
  "title": "Updated Title",
  "content": "Updated content here..."
}
Response:
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Updated Title",
    "content": "Updated content here...",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  "message": "Article updated successfully."
}


Retrieve a list of articles

GET /api/articles

Headers:
Authorization: Bearer your-api-token

Response:
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Article Title",
      "content": "Article content here...",
      "created_at": "timestamp",
      "updated_at": "timestamp"
    },
    {
      "id": 2,
      "title": "Another Article",
      "content": "More content here...",
      "created_at": "timestamp",
      "updated_at": "timestamp"
    }
  ],
  "message": "Articles retrieved successfully."
}

Retrieve a single article

GET /api/article/{id}

Headers:
Authorization: Bearer your-api-token


Response:
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Article Title",
    "content": "Article content here...",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  },
  "message": "Article retrieved successfully."
}

Delete an article

DELETE /api/article/{id}

Authorization: Bearer your-api-token


Response:
{
  "success": true,
  "message": "Article deleted successfully."
}
