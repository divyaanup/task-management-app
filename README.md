

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

  <div>
    <h2>🧠 Key Concepts Used</h2>
  <p>
      Vue 3 Composition API
      Reactive authentication state
      PHP PDO prepared statements
      Session-based authentication
      Vue Router navigation guards
      MVC-style backend structure
    <p>
  </div>
</div>
