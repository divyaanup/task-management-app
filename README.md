<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Management App</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.7;
      margin: 40px;
      background: #f5f5f5;
      color: #333;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h1, h2, h3 {
      color: #222;
    }

    hr {
      margin: 30px 0;
    }

    ul {
      padding-left: 20px;
    }

    pre {
      background: #f0f0f0;
      padding: 15px;
      border-radius: 6px;
      overflow-x: auto;
    }

    code {
      font-family: Consolas, monospace;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table th,
    table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    table th {
      background: #f3f3f3;
    }

    .section {
      margin-bottom: 40px;
    }
  </style>
</head>

<body>

<div class="container">

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

  <div class="section">
    <h2>🚀 Features</h2>

    <ul>
      <li>User registration & login</li>
      <li>PHP session-based authentication</li>
      <li>Protected routes in Vue</li>
      <li>Create, view, update, and delete tasks</li>
      <li>REST-style PHP API endpoints</li>
      <li>Vue Router navigation guards</li>
    </ul>
  </div>

  <div class="section">
    <h2>🧱 Tech Stack</h2>

    <h3>Frontend</h3>
    <ul>
      <li>Vue 3</li>
      <li>Vue Router</li>
      <li>Axios</li>
      <li>Tailwind CSS</li>
      <li>Vite</li>
    </ul>

    <h3>Backend</h3>
    <ul>
      <li>Core PHP (No framework)</li>
      <li>PDO (MySQL)</li>
      <li>PHP Sessions</li>
    </ul>

    <h3>Database</h3>
    <ul>
      <li>MySQL</li>
    </ul>
  </div>

  <div class="section">
    <h2>📁 Project Structure</h2>

    <pre><code>
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
    </code></pre>
  </div>

  <div class="section">
    <h2>⚙️ Installation</h2>

    <h3>1. Clone the project</h3>

    <pre><code>git clone https://github.com/divyaanup/task-management-app.git</code></pre>

    <h3>2. Backend Setup (PHP)</h3>

    <p>Create database:</p>

    <pre><code>CREATE DATABASE task_manager;</code></pre>

    <p>Import <code>database.sql</code>.</p>

    <p>Update database configuration:</p>

    <pre><code>
return [
    'host' => '127.0.0.1',
    'db' => 'task_manager',
    'user' => 'root',
    'pass' => '',
    'charset' => 'utf8mb4',
];
    </code></pre>
    <pre><code>
    cd backend
    php -S localhost:8000
    </code></pre>

    <h3>3. Frontend Setup</h3>

    <pre><code>
        cd frontend
        npm install
        npm run dev
    </code></pre>
  </div>
  <div>
    <h3>Test User login Credentials:</h3>

    <p>Email: test@example.com</p>
    <p>Password: password123</p>
  </div>
  <div class="section">
    <h2>🔐 Authentication Flow</h2>

    <ul>
      <li>PHP uses <code>$_SESSION</code> for authentication</li>
      <li>Login creates a server-side session</li>
      <li>Vue Router protects routes using navigation guards</li>
      <li>Unauthenticated users are redirected to <code>/login</code></li>
    </ul>

    <p>Example:</p>

    <pre><code>meta: { requiresAuth: true }</code></pre>
  </div>

  <div class="section">
    <h2>🔁 API Endpoints</h2>

    <table>
      <thead>
        <tr>
          <th>Method</th>
          <th>Endpoint</th>
          <th>Description</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>POST</td>
          <td>/login</td>
          <td>User login</td>
        </tr>

        <tr>
          <td>POST</td>
          <td>/logout</td>
          <td>User logout</td>
        </tr>

        <tr>
          <td>POST</td>
          <td>/register</td>
          <td>Create account</td>
        </tr>

        <tr>
          <td>GET</td>
          <td>/tasks</td>
          <td>Fetch tasks</td>
        </tr>

        <tr>
          <td>POST</td>
          <td>/tasks</td>
          <td>Create task</td>
        </tr>

        <tr>
          <td>PUT</td>
          <td>/tasks/update</td>
          <td>Update task</td>
        </tr>

        <tr>
          <td>DELETE</td>
          <td>/tasks/delete</td>
          <td>Delete task</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="section">
    <h2>🧠 Key Concepts Used</h2>

    <ul>
      <li>Vue 3 Composition API</li>
      <li>Reactive authentication state</li>
      <li>PHP PDO prepared statements</li>
      <li>Session-based authentication</li>
      <li>Vue Router navigation guards</li>
      <li>MVC-style backend structure</li>
    </ul>
  </div>
</div>

</body>
</html>