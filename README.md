# Betterweb README

This README provides a quick guide to set up and run a project using the Inertia.js stack. Inertia combines the best of both server-side and client-side frameworks to create a smooth, modern web development experience.

## Getting Started

### Prerequisites

Before you begin, make sure you have the following installed on your system:

- PHP (7.4 or higher)
- Composer
- Node.js (LTS version)
- NPM or Yarn
- Laravel CLI

### Installation

1. Clone the repository:

   ```bash
   git clone <repository_url>
   ```

2. Navigate to the project directory:

   ```bash
   cd <project_directory>
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Install JavaScript dependencies:

   ```bash
   npm install
   # or
   yarn
   ```

5. Copy the `.env` file:

   ```bash
   cp .env.example .env
   ```

6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Configure your database in the `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

8. Migrate the database:

   ```bash
   php artisan migrate
   ```

9. Generate Ziggy file

    ```bash
    php artisan ziggy:generate
    ```

### Running the Application

1. Start the development server:

   ```bash
   php artisan serve
   ```

2. Open your browser and visit [http://localhost:8000](http://localhost:8000).

### Development with Inertia.js

The project is set up to use Inertia.js and Vue.js by default. Inertia allows you to build single-page apps without building an API. Components are written using Vue.js.

- Inertia.js: [https://inertiajs.com/](https://inertiajs.com/)
- Vue.js: [https://vuejs.org/](https://vuejs.org/)

### Additional Commands

- Compile assets (CSS/JS):

  ```bash
  npm run dev
  ```

- Run tests:

  ```bash
  php artisan test
  ```

## Contributing

Feel free to contribute to this project by opening issues or submitting pull requests. Make sure to follow the project's coding standards.

## License

This project is open-source and available under the [MIT License](LICENSE).