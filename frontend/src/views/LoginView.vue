<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuth } from '../composables/useAuth'

const email = ref('')
const password = ref('')

const router = useRouter()

const errors = ref({
  email: '',
  password: ''
})

const validateForm = () => {
  errors.value = {
    email: '',
    password: ''
  }

  let isValid = true

  // EMAIL REQUIRED
  if (!email.value.trim()) {
    errors.value.email = 'Email is required'
    isValid = false
  }

  // EMAIL FORMAT
  else if (!/\S+@\S+\.\S+/.test(email.value)) {
    errors.value.email = 'Invalid email format'
    isValid = false
  }

  // PASSWORD REQUIRED
  if (!password.value.trim()) {
    errors.value.password = 'Password is required'
    isValid = false
  }

  return isValid
}

const { login } = useAuth()

const handleLogin = async () => {
  if (!validateForm()) return

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

      <p
        v-if="errors.email"
        class="text-red-500 text-sm"
      >
        {{ errors.email }}
      </p>
      <input
        v-model="email"
        type="email"
        placeholder="Email"
        class="w-full border p-3 rounded mb-4"
      />
      <p
        v-if="errors.password"
        class="text-red-500 text-sm"
      >
        {{ errors.password }}
      </p>
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