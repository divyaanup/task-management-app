

  <h1>Task Management App (Vue + Core PHP)</h1>

  <p>
    A simple full-stack task management application built with
    <strong>Vue 3 (frontend)</strong> and
    <strong>Core PHP (backend API)</strong> using
    <strong>MySQL</strong> for data storage.
  </p>

  <p>
    This application allows only authenticated users to access the
    <strong>Tasks</strong> page.
  </p>

  <hr>
  <h2>🚀 Features</h2>
    
   - User registration & login
   - PHP session-based authentication
   - Protected routes in Vue
   - Create, view, update, and delete tasks
   - REST-style PHP API endpoints
   - Router navigation guards
    <h2>🧱 Tech Stack</h2>
    <strong>Frontend</strong>
      - Vue 3
      - Vue Router
      - Axios
      - Tailwind CSS
      - Vite
    
     <strong>Backend</strong>
      - Core PHP (No framework)
      - PDO (MySQL)
      - PHP Sessions
        
     <strong>Database</strong>
      - MySQL
<h2>📁 Project Structure</h2>

   ```
├── README.md
├── backend
│   ├── config
│   │   ├── database.php
│   │   └── dbconfig.php
│   ├── controllers
│   │   ├── AuthController.php
│   │   └── TaskController.php
│   ├── helpers
│   │   └── Response.php
│   ├── middleware
│   │   └── AuthMiddleware.php
│   ├── repositories
│   │   ├── TaskRepository.php
│   │   └── UserRepository.php
│   ├── routes
│   │   └── api.php
│   └── index.php
│
├── database.sql
│
└── frontend
    ├── index.html
    ├── package.json
    ├── package-lock.json
    ├── vite.config.js
    ├── tailwind.config.js
    ├── postcss.config.js
    ├── public
    │   ├── favicon.svg
    │   └── icons.svg
    │
    └── src
        ├── App.vue
        ├── main.js
        ├── style.css
        │
        ├── api
        │   └── axios.js
        │
        ├── assets
        │   ├── hero.png
        │   ├── vite.svg
        │   └── vue.svg
        │
        ├── components
        │   ├── AppFooter.vue
        │   ├── AppHeader.vue
        │   ├── TaskCreateForm.vue
        │   ├── TaskEditForm.vue
        │   └── TaskList.vue
        │
        ├── composables
        │   ├── useAuth.js
        │   └── useTasks.js
        │
        ├── router
        │   └── index.js
        │
        └── views
            ├── LoginView.vue
            ├── RegisterView.vue
            └── TasksView.vue
```
   <h2>⚙️ Installation</h2>

    1. Clone the project

    git clone https://github.com/divyaanup/task-management-app.git

    2. Backend Setup (PHP)

    - Create database:

    CREATE DATABASE task_manager;

    - Import database.sql

    - Update database configuration:

    return [
      'host' => '127.0.0.1',
      'db' => 'task_manager',
      'user' => 'root',
      'pass' => '',
      'charset' => 'utf8mb4',
     ];
  
    cd backend
    php -S localhost:8000

    3. Frontend Setup
    
        cd frontend
        npm install
        npm run dev
        
   Test User login Credentials:

    Email: test@example.com
    Password: password123

<div>
    <h2>🔐 Authentication Flow</h2>
  
     - PHP uses $_SESSION for authentication
     - Login creates a server-side session
     - Vue Router protects routes using navigation guards
     - Unauthenticated users are redirected to /login
    
    Example:

    meta: { requiresAuth: true }
</div>
  <div class="section">
    <h2>🔁 API Endpoints</h2>

    | Method | Endpoint        | Description     |
    |--------|-----------------|-----------------|
    | POST   | /login          | User login      |
    | POST   | /logout         | User logout     |
    | POST   | /register       | Create account  |
    | GET    | /tasks          | Fetch tasks     |
    | POST   | /tasks          | Create task     |
    | PUT    | /tasks/update   | Update task     |
    | DELETE | /tasks/delete   | Delete task     |
  </div>
  <div class="section">
  
  <h2>🧠 Key Concepts Used</h2>
  
    - Vue 3 Composition API
    - Reactive authentication state
    - PHP PDO prepared statements
    - Session-based authentication
    - Vue Router navigation guards
    - MVC-style backend structure
</div>
