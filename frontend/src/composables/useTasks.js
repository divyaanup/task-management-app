import { ref } from 'vue'
import api from '../api/axios'

const tasks = ref([])
const editingTask = ref(null)

export function useTasks() {

    const fetchTasks = async (status = '') => {

        let url = '/?path=tasks'

        if (status) {
        url += `&status=${status}`
        }

        const response = await api.get(url)

        tasks.value = response.data
    }

    const startEdit = (task) => {
        editingTask.value = { ...task }
    }

    const createTask = async (task) => {

        await api.post('/?path=tasks', task)

        await fetchTasks()
    }

    const updateTask = async (task) => {

        await api.put('/?path=tasks', task)

        editingTask.value = null

        await fetchTasks()
    }

    const deleteTask = async (id) => {

        await api.delete(`/?path=tasks&id=${id}`)

        await fetchTasks()
    }

    return {
        tasks,
        fetchTasks,
        createTask,
        startEdit,
        updateTask,
        deleteTask,
        editingTask
    }
}