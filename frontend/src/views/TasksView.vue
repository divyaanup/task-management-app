<script setup>
import { ref, onMounted, nextTick } from 'vue'
import { useTasks } from '../composables/useTasks'
import TaskCreateForm from '../components/TaskCreateForm.vue'
import TaskList from '../components/TaskList.vue'
import TaskEditForm from '../components/TaskEditForm.vue'

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
  due_date: ''
})

const editErrors = ref({
  name: '',
  due_date: ''
})

const successMessage = ref('')
const errorMessage = ref('')

onMounted(() => {
  fetchTasks()
})

const editFormRef = ref(null)

/* -------------------------
   VALIDATION CORE
--------------------------*/
const validateTask = (task) => {
  const errors = {
    name: '',
    due_date: ''
  }

  let isValid = true

  if (!task.name?.trim()) {
    errors.name = 'Task name is required'
    isValid = false
  }

  if (!task.due_date) {
    errors.due_date = 'Due date is required'
    isValid = false
  }

  return { isValid, errors }
}

/* -------------------------
   CREATE VALIDATION
--------------------------*/
const validateCreateForm = () => {
  const result = validateTask({
    name: name.value,
    due_date: due_date.value
  })

  errors.value = result.errors
  return result.isValid
}

/* -------------------------
   UPDATE VALIDATION
--------------------------*/
const validateUpdateForm = () => {
  const result = validateTask(editingTask.value)
  editErrors.value = result.errors
  return result.isValid
}

/* -------------------------
   MESSAGES
--------------------------*/
const clearMessages = () => {
  setTimeout(() => {
    successMessage.value = ''
    errorMessage.value = ''
  }, 3000)
}

/* -------------------------
   CREATE TASK
--------------------------*/
const handleCreate = async () => {
  if (!validateCreateForm()) return

  await createTask({
    name: name.value,
    due_date: due_date.value,
    description: description.value,
    status: 'active'
  })

  successMessage.value = 'Task added successfully'

  name.value = ''
  due_date.value = ''
  description.value = ''

  errors.value = { name: '', due_date: '' }

  clearMessages()
}

/* -------------------------
   EDIT TASK
--------------------------*/
const handleEdit = async (task) => {
  startEdit(task)

  await nextTick()

  editFormRef.value?.scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  })
}

/* -------------------------
   UPDATE TASK
--------------------------*/
const handleUpdate = async () => {
  if (!validateUpdateForm()) return

  await updateTask(editingTask.value)

  successMessage.value = 'Task updated successfully'

  editErrors.value = { name: '', due_date: '' }

  editingTask.value = null

  clearMessages()
}

/* -------------------------
   FILTER
--------------------------*/
const filterTasks = async () => {
  await fetchTasks(statusFilter.value)
}
</script>

<template>
  <div class="max-w-4xl mx-auto p-8">

    <!-- SUCCESS / ERROR MESSAGES -->
    <div v-if="successMessage" class="bg-green-100 text-green-700 p-3 rounded mb-4">
      {{ successMessage }}
    </div>

    <div v-if="errorMessage" class="bg-red-100 text-red-700 p-3 rounded mb-4">
      {{ errorMessage }}
    </div>

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-3xl font-bold">Tasks</h1>

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

    <!-- CREATE FORM -->
    <TaskCreateForm
      :name="name"
      :due_date="due_date"
      :description="description"
      :errors="errors"
      @update:name="name = $event"
      @update:due_date="due_date = $event"
      @update:description="description = $event"
      @submit="handleCreate"
    />

    <!-- EDIT FORM -->
    <div
      v-if="editingTask"
      ref="editFormRef"
    >
      <TaskEditForm
        :editingTask="editingTask"
        :editErrors="editErrors"
        @update="handleUpdate"
        @cancel="editingTask = null"
      />
    </div>

    <!-- TASK LIST -->
    <TaskList
      :tasks="tasks"
      @edit="handleEdit"
      @delete="deleteTask"
  />
  </div>
</template>