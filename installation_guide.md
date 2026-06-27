# Local Development Setup Guide

This guide outlines the steps, dependencies, software, and packages required to clone and run the SkillNet platform locally.

## 1. Prerequisites and Software Required

Before cloning the project, ensure you have the following software installed on your device:

- **Git**: To clone the repository.
- **PHP**: Version `8.0.2` or higher (since the project uses Laravel 9).
- **Composer**: PHP dependency manager.
- **MySQL / MariaDB**: A local database server (you can use tools like XAMPP, WAMP, or Laragon which bundle PHP, MySQL, and a web server together).
- **Node.js & npm**: (Optional but recommended) For frontend asset compilation using Vite, if needed later.

### Required PHP Extensions
Your PHP installation must have the following extensions enabled (most are enabled by default in standard PHP/XAMPP installations):
- Ctype
- cURL
- DOM
- Fileinfo
- Filter
- Hash
- Mbstring
- OpenSSL
- PCRE
- PDO (and `pdo_mysql`)
- Session
- Tokenizer
- XML

---

## 2. Cloning the Repository

Open your terminal or command prompt and run the following command to clone the project from GitHub:

```bash
git clone <YOUR_GITHUB_REPO_URL>
cd <YOUR_PROJECT_DIRECTORY>
```
*(Replace `<YOUR_GITHUB_REPO_URL>` with the actual URL of the repository).*

---

## 3. Backend Setup (Laravel)

The backend is built with Laravel 9 and is located in the `SkillNet/skillnest-backend` directory.

### Step 1: Install Composer Dependencies
Navigate to the backend directory and install all required PHP packages defined in `composer.json` (such as `laravel/framework`, `guzzlehttp/guzzle`, `laravel/sanctum`, etc.):

```bash
cd SkillNet/skillnest-backend
composer install
```

### Step 2: Environment Configuration
Create the environment configuration file by copying the provided example:

```bash
# On Windows (Command Prompt)
copy .env.example .env

# On Mac/Linux/GitBash
cp .env.example .env
```

### Step 3: Database Setup
1. Open your MySQL client (e.g., phpMyAdmin, TablePlus, or the MySQL command line).
2. Create a new empty database (for example, named `skillnest`).
3. Open the newly created `.env` file in a text editor and update the database connection settings to match your local setup:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=skillnest    # Name of the database you created
DB_USERNAME=root         # Your MySQL username (default for XAMPP is 'root')
DB_PASSWORD=             # Your MySQL password (default for XAMPP is empty)
```

### Step 4: Generate Application Key
Run the following command to generate a unique application key for Laravel encryption:

```bash
php artisan key:generate
```

### Step 5: Run Database Migrations
Run the migrations to create the necessary tables (users, courses, enrollments, etc.) in your database:

```bash
php artisan migrate
```
*(If you have seeders to populate initial data, you can run `php artisan migrate --seed` instead).*

### Step 6: Start the Backend Server
Start the Laravel development server:

```bash
php artisan serve
```
The backend API will now be running at `http://127.0.0.1:8000`. Leave this terminal open.

---

## 4. Frontend Setup (HTML/CSS/JS)

The frontend is a vanilla web application containing static HTML, CSS, and JS files, located in the `SkillNet` folder. 

1. Open a **new terminal window** (do not close the backend server terminal).
2. Navigate to the frontend directory:
   ```bash
   cd SkillNet
   ```
3. Start a local static file server. Since you already have PHP installed, you can easily serve the frontend using PHP's built-in web server:
   ```bash
   php -S localhost:3000
   ```
4. Open your web browser and visit `http://localhost:3000`.

*(Alternatively, you can open the `SkillNet` folder in VS Code and use the **Live Server** extension to serve the files).*

---

## 5. Verify the Setup
- You should now be able to view the frontend in your browser at port `3000`.
- The frontend will make API requests to your Laravel backend running on port `8000`.
- Try registering a new user or logging in to ensure the database connection and APIs are functioning correctly.
