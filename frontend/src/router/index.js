import { createRouter, createWebHistory } from 'vue-router'

import { useAuth } from '../composables/useAuth'
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
    path: '/logout',
    redirect: '/login'
  },
  {
    path: '/tasks',
    name: 'tasks',
    component: TasksView,
    meta: { requiresAuth: true }
  }
]
const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach(async (to) => {

  const { isLoggedIn } = useAuth()

  if (to.meta.requiresAuth && !isLoggedIn()) {
      return '/login'
  }
})


export default router