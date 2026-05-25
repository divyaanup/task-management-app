<script setup>
import { ref, onMounted, nextTick } from 'vue'

import { useTasks } from '../composables/useTasks'

const {
  tasks,
  fetchTasks,
  createTask,
  updateTask,
  editingTask,
  deleteTask,
  startEdit
} = useTasks()

const name = ref('')
const due_date = ref('')
const description = ref('')
const statusFilter = ref('')
const errors = ref({
  name: '',
  due_date: '',
})

onMounted(() => {
  fetchTasks()
})


const editFormRef = ref(null)

const handleEdit = async (task) => {
  startEdit(task)

  await nextTick()

  editFormRef.value?.scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  })
}
const handleCreate = async () => {

  if (!validateForm()) return

  await createTask({
    name: name.value,
    due_date: due_date.value,
    description: description.value,
    status: 'active'
  })

  name.value = ''
  due_date.value = ''
  description.value = ''
  errors.value.name = ''
  errors.value.due_date = ''
}
const validateForm = () => {
  let isValid = true

  errors.value.name = ''
  errors.value.due_date = ''

  if (!name.value.trim()) {
    errors.value.name = 'Task name is required'
    isValid = false
  }

  if (!due_date.value) {
    errors.value.due_date = 'Due date is required'
    isValid = false
  }

  return isValid
}

const filterTasks = async () => {
  await fetchTasks(statusFilter.value)
}
</script>

<template>

  <div class="max-w-4xl mx-auto p-8">

    <div class="flex items-center justify-between mb-8">

      <h1 class="text-3xl font-bold">
        Tasks
      </h1>

      <select
        v-model="statusFilter"
        @change="filterTasks"
        class="border p-2 rounded"
      >
        <option value="">All</option>
        <option value="active">Active</option>
        <option value="completed">Completed</option>
      </select>

    </div>

    <div class="bg-white p-6 rounded-xl shadow mb-8">

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex flex-col">
            <input
            v-model="name"
            placeholder="Task name"
            class="border p-3 rounded"
            />
            <p v-if="errors.name" class="text-red-500 text-sm mt-1">
                {{ errors.name }}
            </p>
        </div>
        <div class="flex flex-col">
            <input
            v-model="due_date"
            type="date"
            class="border p-3 rounded"
            />
            <p v-if="errors.due_date" class="text-red-500 text-sm mt-1">
                {{ errors.due_date }}
            </p>
        </div>
        <textarea
            v-model="description"
            placeholder="Task description"
            class="border p-3 rounded md:col-span-3"
            rows="4"
        ></textarea>

        <button
          @click="handleCreate"
          class="bg-gray-500 text-white rounded px-4 py-3 md:col-span-1"
        >
          Add Task
        </button>

      </div>

    </div>

    <div v-if="editingTask" ref="editFormRef" class="bg-slate-50 p-6 rounded-xl shadow mb-6">

        <h2 class="text-xl font-bold mb-4">Edit Task</h2>

        <input
            v-model="editingTask.name"
            class="border p-2 w-full mb-2"
            placeholder="Task name"
        />

        <input
            v-model="editingTask.due_date"
            type="date"
            class="border p-2 w-full mb-2"
        />
        <textarea
            v-model="editingTask.description"
            class="border p-2 w-full mb-2"
            placeholder="Task description"
            rows="4"
        ></textarea>
        <select v-model="editingTask.status" class="border p-2 w-full mb-4">
            <option value="active">Active</option>
            <option value="completed">Completed</option>
        </select>

        <div class="flex gap-2">

            <button
            @click="updateTask(editingTask)"
            class="bg-green-600 text-white px-4 py-2 rounded"
            >
            Save
            </button>

            <button
            @click="editingTask = null"
            class="bg-gray-400 text-white px-4 py-2 rounded"
            >
            Cancel
            </button>

        </div>

    </div>

    <div class="space-y-4">
        <div
            v-for="task in tasks"
            :key="task.id"
            class="bg-white p-5 rounded-xl shadow flex justify-between items-center"
        >
            <div>

                <h2 class="font-semibold text-lg">
                {{ task.name }}
                </h2>

                <p class="text-sm text-gray-500">
                Due: {{ task.due_date }}
                </p>
                <p class="text-sm text-gray-500">
                    Description: {{ task.description }}
                </p>
                <span
                class="inline-block mt-2 text-xs px-3 py-1 rounded-full"
                :class="task.status === 'completed'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-yellow-100 text-yellow-700'"
                >
                {{ task.status }}
                </span>

            </div>

            <div class="flex items-center gap-3">

                <button
                @click="handleEdit(task)"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-200"
                >
                Edit
                </button>

                <button
                @click="deleteTask(task.id)"
                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-200"
                >
                Delete
                </button>

            </div>

        </div>

    </div>

  </div>

</template>