# News App

A Laravel application for managing news articles, running via Docker.

## Prerequisites

- [Docker](https://www.docker.com/products/docker-desktop)

## Getting Started

Follow these steps to set up and run the application using Docker:

### 1. Environment Configuration

First, copy the example `.env` file and set up your environment variables:

```bash
cp .env.example .env
```

### 2. Start Docker Containers

Build and start the Docker containers in detached mode:

```bash
docker compose up -d --build
```

This will spin up three containers:

- `laravel_app` (PHP application)
- `nginx_server` (Web server mapped to port `8000`)
- `mysql_db` (MySQL database)

### 3. Install PHP Dependencies

Install the Composer dependencies from inside the PHP container:

```bash
docker exec -it laravel_app composer install
```

### 4. Application Setup

Generate the Laravel application key and run the database migrations:

```bash
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan migrate
```

### 5. Access the Application

Once everything is up and running, you can access the application in your web browser at:

[http://localhost:8000](http://localhost:8000)