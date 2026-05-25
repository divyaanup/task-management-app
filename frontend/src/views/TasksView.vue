<script setup>
import { onMounted, nextTick, ref } from 'vue'

import { useTasks } from '../composables/useTasks'
import { useTaskForm } from '../composables/useTaskForm'
import { useToast } from '../composables/useToast'

import TaskForm from '../components/TaskForm.vue'
import TaskList from '../components/TaskList.vue'
import TaskEditForm from '../components/TaskEditForm.vue'
import Toast from '../components/Toast.vue'

/* -----------------------------
   TASK LOGIC
------------------------------*/
const {
  tasks,
  fetchTasks,
  deleteTask,
  startEdit,
  editingTask,
  createTask,
  updateTask
} = useTasks()

/* -----------------------------
   FORM STATE
------------------------------*/
const { form, resetForm, setErrors } = useTaskForm()

/* -----------------------------
   TOAST
------------------------------*/
const { toast, showToast } = useToast()

/* -----------------------------
   REFS
------------------------------*/
const editFormRef = ref(null)

/* -----------------------------
   INIT
------------------------------*/
onMounted(() => {
  fetchTasks()
})

/* -----------------------------
   CREATE TASK
------------------------------*/
const handleCreate = async () => {
  const result = await createTask({
    name: form.name,
    due_date: form.due_date,
    description: form.description,
    status: 'active'
  })

  /*if (setErrors) {
    form.setErrors(setErrors)
    return
  }

  resetForm()*/
  showToast('Task added successfully', 'success')
}

/* -----------------------------
   EDIT TASK
------------------------------*/
const handleEdit = async (task) => {
  startEdit(task)

  await nextTick()
  editFormRef.value?.scrollIntoView({ behavior: 'smooth' })
}

/* -----------------------------
   UPDATE TASK
------------------------------*/
const handleUpdate = async () => {
  const result = await updateTask(editingTask.value)

  if (!result.isValid) return

  showToast('Task updated successfully', 'success')
}

/* -----------------------------
   DELETE TASK
------------------------------*/
const handleDelete = async (id) => {
  await deleteTask(id)
  showToast('Task deleted successfully', 'success')
}
</script>

<template>
  <div class="max-w-4xl mx-auto p-8">

    <!-- TOAST -->
    <Toast :toast="toast" />

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-3xl font-bold">Tasks</h1>
    </div>

    <!-- CREATE FORM -->
    <div class="bg-white p-6 rounded-xl shadow mb-8">
      <TaskForm
        :form="form"
        :errors="form.errors"
        :onSubmit="handleCreate"
        />
    </div>

    <!-- EDIT FORM -->
    <div ref="editFormRef">
      <TaskEditForm
        v-if="editingTask"
        :task="editingTask"
        :onSave="handleUpdate"
        :onCancel="() => (editingTask = null)"
      />
    </div>

    <!-- TASK LIST -->
    <TaskList
      :tasks="tasks"
      :onEdit="handleEdit"
      :onDelete="handleDelete"
    />

  </div>
</template>