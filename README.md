# Blog Website

## About This Project

This project is a simple blog application built with Laravel. It allows users to create, edit, and delete posts. Each post includes a title, body, and the name of the user who posted it. The application demonstrates basic CRUD (Create, Read, Update, Delete) operations and form validation in Laravel.

### Features

- Create new posts with a title, body, and author.
- Edit existing posts.
- Delete posts.
- Display a list of all posts.
- Display individual post details.
- Form validation with error messages.

### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/post-lab-iti.git
    cd post-lab-iti
    ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Copy the example environment file and configure it:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Set up your database and run migrations:
    ```sh
    php artisan migrate
    ```

5. Serve the application:
    ```sh
    php artisan serve
    ```

### Usage

- Visit `http://localhost:8000` in your browser.
- Use the navigation bar to create new posts or view existing ones.
- Edit or delete posts from the post list or individual post view.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
