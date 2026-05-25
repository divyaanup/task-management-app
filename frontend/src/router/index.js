import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '../views/LoginView.vue'
import TasksView from '../views/TasksView.vue'
import RegisterView from '../views/RegisterView.vue'

const routes = [
  {
    path: '/register',
    name: 'register',
    component: RegisterView
  },
  {
  path: '/',
  redirect: '/login'
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/tasks',
    name: 'tasks',
    component: TasksView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router