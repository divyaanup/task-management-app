<script setup>
import { useRouter } from 'vue-router'
import { useAuth } from '../composables/useAuth'

const router = useRouter()
const { user, logout, isLoggedIn } = useAuth()
const handleLogout = async () => {
  await logout()
  router.push('/')
}
const goRegister = () => {
  router.push('/register')
}

const goLogin = () => {
  router.push('/')
}
</script>


<template>
    <header class="w-full bg-black text-white px-6 py-4 flex justify-between items-center shadow">

        <h1 class="text-xl font-bold cursor-pointer" @click="goLogin">
        Task Manager
        </h1>

        <div class="flex items-center gap-3">
            <!-- Logged IN -->
            <template v-if="isLoggedIn()">
                <span class="text-sm text-gray-300">
                    {{ user?.email }}
                </span>

                <button
                    @click="handleLogout"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition"
                >
                    Logout
                </button>
            </template>

            <!-- Logged OUT -->
            <template v-else>
                <button
                    @click="goRegister"
                    class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg transition"
                >
                    Register
                </button>
            </template>
        </div>
    </header>
</template>