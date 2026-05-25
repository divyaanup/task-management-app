# task-management-app

Task Manager App (Vue + Core PHP)

A simple full-stack task management application built with Vue 3 (frontend) and Core PHP (backend API) using MySQL for data storage. This application allows only authenticated users to access the 'Tasks' page.

🚀 Features
User registration & login
PHP session-based authentication
Protected routes in Vue
Create, view, and manage tasks
REST-style PHP API endpoints
Vue Router navigation guards
🧱 Tech Stack
Frontend
Vue 3
Vue Router
Axios
Backend
Core PHP (no framework)
PDO (MySQL)
PHP Sessions
Database
MySQL
📁 Project Structure
project/
│
├── backend
│   ├── config
│   │   ├── database.php
│   │   └── dbconfig.php
│   ├── controllers
│   │   ├── AuthController.php
│   │   └── TaskController.php
│   ├── helpers
│   │   └── Response.php
│   ├── index.php
│   ├── middleware
│   │   └── AuthMiddleware.php
│   ├── repositories
│   │   ├── TaskRepository.php
│   │   └── UserRepository.php
│   └── routes
│       └── api.php
└── frontend
    ├── index.html
    ├── package-lock.json
    ├── package.json
    ├── postcss.config.js
    ├── public
    │   ├── favicon.svg
    │   └── icons.svg
    ├── src
    │   ├── App.vue
    │   ├── api
    │   │   └── axios.js
    │   ├── assets
    │   │   ├── hero.png
    │   │   ├── vite.svg
    │   │   └── vue.svg
    │   ├── components
    │   │   ├── AppFooter.vue
    │   │   ├── AppHeader.vue
    │   │   ├── TaskCreateForm.vue
    │   │   ├── TaskEditForm.vue
    │   │   └── TaskList.vue
    │   ├── composables
    │   │   ├── useAuth.js
    │   │   └── useTasks.js
    │   ├── main.js
    │   ├── router
    │   │   └── index.js
    │   ├── style.css
    │   └── views
    │       ├── LoginView.vue
    │       ├── RegisterView.vue
    │       └── TasksView.vue
    ├── tailwind.config.js
    └── vite.config.js
⚙️ Installation
1. Clone project
git clone https://github.com/divyaanup/task-management-app.git
2. Backend setup (PHP)
Move backend to your server (e.g. XAMPP htdocs)
Create database:
CREATE DATABASE task_manager;
Import database.sql
Update config:
return [
    'host' => '127.0.0.1',
    'db' => 'task_manager',
    'user' => 'root',
    'pass' => '',
    'charset' => 'utf8mb4',
];
3. Frontend setup
cd frontend
npm install
npm run dev
🔐 Authentication Flow
PHP uses sessions ($_SESSION)
Login creates a session on the server
Protected routes use Vue Router guards:
meta: { requiresAuth: true }
Unauthenticated users are redirected to /login

🔁 API Endpoints
Method	Endpoint	Description
POST	/login	User login
POST	/logout	User logout
POST	/register	Create account
GET	/tasks	Fetch tasks
POST	/tasks	Create task
PUT  task/update Update task
DELETE task/delete Delete task