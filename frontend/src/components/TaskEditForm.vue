<script setup>
defineProps({
  task: Object,
  errors: Object,
  onSave: Function,
  onCancel: Function
})
</script>

<template>
  <div class="bg-slate-50 p-6 rounded-xl shadow mb-6">

    <h2 class="text-xl font-bold mb-4">Edit Task</h2>

    <input v-model="task.name" class="border p-2 w-full mb-1" />
    <p v-if="errors?.name" class="text-red-500 text-sm mb-2">{{ errors.name }}</p>

    <input v-model="task.due_date" type="date" class="border p-2 w-full mb-1" />
    <p v-if="errors?.due_date" class="text-red-500 text-sm mb-2">{{ errors.due_date }}</p>

    <textarea v-model="task.description" class="border p-2 w-full mb-2"></textarea>

    <select v-model="task.status" class="border p-2 w-full mb-4">
      <option value="active">Active</option>
      <option value="completed">Completed</option>
    </select>

    <div class="flex gap-2">
      <button @click="onSave(task)" class="bg-green-600 text-white px-4 py-2 rounded">
        Save
      </button>

      <button @click="onCancel" class="bg-gray-400 text-white px-4 py-2 rounded">
        Cancel
      </button>
    </div>

  </div>
</template>