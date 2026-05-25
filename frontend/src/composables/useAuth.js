import { ref } from 'vue'
import api from '../api/axios'

const user = ref(null)

export function useAuth() {
    const login = async (email, password) => {
        const res = await api.post('/?path=login', {
            email,
            password
        })
        user.value = res.data.user
        return user.value
    }

    const logout = async () => {
        await api.post('/?path=logout')
        user.value = null
    }

    const isLoggedIn = () => {
        return !!user.value
    }

    return {
        user,
        login,
        logout,
        isLoggedIn
    }
}