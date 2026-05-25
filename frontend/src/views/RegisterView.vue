<script setup>
import { ref } from 'vue'
import api from '../api/axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)
const message = ref('')
const name = ref('')
const email = ref('')
const password = ref('')
const confirmPassword = ref('')

const errors = ref({
  name: '',
  email: '',
  password: '',
  confirmPassword: ''
})

const validateForm = () => {
  errors.value = {
    name: '',
    email: '',
    password: '',
    confirmPassword: ''
  }

  let isValid = true

  // NAME
  if (!name.value.trim()) {
    errors.value.name = 'Name is required'
    isValid = false
  }

  // EMAIL
  if (!email.value.trim()) {
    errors.value.email = 'Email is required'
    isValid = false
  } else if (!/\S+@\S+\.\S+/.test(email.value)) {
    errors.value.email = 'Invalid email format'
    isValid = false
  }

  // PASSWORD
  if (!password.value.trim()) {
    errors.value.password = 'Password is required'
    isValid = false
  } else if (password.value.length < 6) {
    errors.value.password = 'Password must be at least 6 characters'
    isValid = false
  }

  // CONFIRM PASSWORD
  if (!confirmPassword.value.trim()) {
    errors.value.confirmPassword = 'Confirm password is required'
    isValid = false
  } else if (password.value !== confirmPassword.value) {
    errors.value.confirmPassword = 'Passwords do not match'
    isValid = false
  }

  return isValid
}

const register = async () => {
  if (!validateForm()) return
  errors.value = {}
  message.value = ''
  loading.value = true

  try {
    const res = await api.post('/?path=register', {
      name: name.value,
      email: email.value,
      password: password.value
    })

    message.value = res.data.message

    // redirect after success
    setTimeout(() => {
      router.push('/login')
    }, 2000)

  } catch (err) {
    const res = err.response

    if (res?.status === 409) {
      message.value = res.data.message
    } else if (res?.status === 422) {
      message.value = res.data.message
    } else {
      message.value = 'Something went wrong'
    }
  } finally {
    loading.value = false
  }
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center">
        
        <div class="bg-white p-8 rounded-xl shadow w-full max-w-md">
            <div v-if="message" class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ message }}
            </div>
            <h1 class="text-2xl font-bold mb-6">Register</h1>

            <!-- NAME -->
            <div class="mb-4">
                <input
                v-model="name"
                type="text"
                name="name"
                placeholder="Name"
                class="w-full border p-3 rounded"
                required
                />

                <p
                v-if="errors.name"
                class="text-red-500 text-sm mt-1"
                >
                {{ errors.name }}
                </p>
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <input
                v-model="email"
                type="email"
                name="email"
                placeholder="Email"
                autocomplete="email"
                class="w-full border p-3 rounded"
                required
                />

                <p
                v-if="errors.email"
                class="text-red-500 text-sm mt-1"
                >
                {{ errors.email }}
                </p>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <input
                v-model="password"
                type="password"
                name="password"
                placeholder="Password"
                class="w-full border p-3 rounded"
                required
                />

                <p
                v-if="errors.password"
                class="text-red-500 text-sm mt-1"
                >
                {{ errors.password }}
                </p>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mb-6">
                <input
                v-model="confirmPassword"
                type="password"
                name="confirmPassword"
                placeholder="Confirm Password"
                class="w-full border p-3 rounded"
                required
                />

                <p
                v-if="errors.confirmPassword"
                class="text-red-500 text-sm mt-1"
                >
                {{ errors.confirmPassword }}
                </p>
            </div>

            <button
            @click="register"
            :disabled="loading"
            class="bg-black text-white px-4 py-3 rounded w-full"
            >
            {{ loading ? 'Creating account...' : 'Register' }}
            </button>
        </div>
    </div>
</template>