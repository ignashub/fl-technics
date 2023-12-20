# Calculator Application

This application consists of several Vue components and Laravel backend endpoints:

## Components

- **Calculator Component**: (`resources/js/Components/Calculator.vue`) This is the main component where users input their numbers and select an operator. It also contains a button to perform the calculation. When the button is clicked, a POST request is sent to the `/calculate` endpoint with the input numbers and operator. The result of the calculation is then displayed in this component.

- **Calculation History Component**: (`resources/js/Components/CalculationHistory.vue`) This component displays the history of calculations. It listens for the `calculation-done` event, and upon receiving this event, it sends a GET request to the `/history` endpoint to fetch the updated history.

- **Welcome Page**: (`resources/js/Components/Welcome.vue`) This is the main page of the application. It includes the Calculator and CalculationHistory components.

## Backend Endpoints

- `/calculate` and `/history`: These are the endpoints in your Laravel backend that perform the calculation and provide the calculation history. They are implemented in the `app/Http/Controllers/CalculationController.php` file.

## Database Migrations

- **User Migration**: (`database/migrations/2014_10_12_100000_create_users_table.php`) This migration file creates the users table in your database. It includes fields for the user's name, email, password, and other authentication-related fields.

- **Calculation Migration**: (`database/migrations/2023_12_20_020507_create_calculations_table.php`) This migration file creates the calculations table in your database. It includes fields for storing each calculation's input numbers, operator, result, and the user who performed the calculation.

This application uses Laravel Jetstream for its authentication system. Jetstream provides a robust, modern scaffolding for user registration, login, email verification, two-factor authentication, session management, API support via Laravel Sanctum, and optional team management.

## Setup

1. **Install MySQL**: If you don't have MySQL installed, you'll need to install it. The installation process depends on your operating system. You can find instructions for various operating systems in the MySQL documentation.

### `sudo apt-get install mysql-server`


2. **Install dependencies**: Navigate to the project directory and install the necessary dependencies with Composer and npm:

### `cd calculator`
### `composer install`
### `npm install`

3. **Set up environment variables**: Copy the `.env.example` file to a new file named `.env`:

### `cp .env.example .env`

4. **Run MySQL server**:

### `sudo service mysql start`

5. **:Compile and optimize Vue and SCSS/LESS files into browser-compatible code for development in a Laravel PHP Vue project.

### `npm run dev`

6. **Generate application key**: Run the following command to generate a new application key:

### `php artisan key:generate`

7. **Run migrations**: Run the following command to execute the database migrations:

### `php artisan migrate`

8. **Start the server**: Finally, you can start the Laravel server with the following command:

### `php artisan serve`


You can now access the application in your web browser at `http://localhost:8000`.
