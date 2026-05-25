<script setup>
defineProps({
  tasks: Array,
  onEdit: Function,
  onDelete: Function
})
</script>

<template>
  <div class="space-y-4">
    <div
      v-for="task in tasks"
      :key="task.id"
      class="bg-white p-5 rounded-xl shadow flex justify-between"
    >
      <div>
        <h2 class="font-semibold text-lg">{{ task.name }}</h2>

        <p class="text-sm text-gray-500">Due: {{ task.due_date }}</p>

        <p class="text-sm text-gray-500">{{ task.description }}</p>

        <span
          class="inline-block mt-2 text-xs px-3 py-1 rounded-full"
          :class="task.status === 'completed'
            ? 'bg-green-100 text-green-700'
            : 'bg-yellow-100 text-yellow-700'"
        >
          {{ task.status }}
        </span>
      </div>

      <div class="flex gap-3">
        <button @click="onEdit(task)" class="bg-blue-500 text-white px-3 py-1 rounded">
          Edit
        </button>

        <button @click="onDelete(task.id)" class="bg-red-500 text-white px-3 py-1 rounded">
          Delete
        </button>
      </div>
    </div>
  </div>
</template>