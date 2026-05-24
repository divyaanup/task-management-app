import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '../views/LoginView.vue'
import TasksView from '../views/TasksView.vue'

const routes = [
  {
    path: '/',
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