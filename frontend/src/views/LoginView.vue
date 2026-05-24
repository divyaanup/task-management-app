<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuth } from '../composables/useAuth'

const email = ref('')
const password = ref('')

const router = useRouter()

const { login } = useAuth()

const handleLogin = async () => {

  try {
    await login(email.value, password.value)

    router.push('/tasks')

  } catch (error) {

    alert('Invalid credentials')
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow w-full max-w-md">

      <h1 class="text-2xl font-bold mb-6">
        Login
      </h1>

      <input
        v-model="email"
        type="email"
        placeholder="Email"
        class="w-full border p-3 rounded mb-4"
      />

      <input
        v-model="password"
        type="password"
        placeholder="Password"
        class="w-full border p-3 rounded mb-4"
      />

      <button
        @click="handleLogin"
        class="bg-black text-white px-4 py-3 rounded w-full"
      >
        Login
      </button>

    </div>

  </div>
</template>