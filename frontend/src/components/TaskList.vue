<script setup>
defineProps({
  tasks: {
    type: Array,
    required: true
  }
})

defineEmits(['edit', 'delete'])
</script>

<template>
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
          {{ task.description }}
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
          @click="$emit('edit', task)"
          class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg"
        >
          Edit
        </button>

        <button
          @click="$emit('delete', task.id)"
          class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg"
        >
          Delete
        </button>
      </div>
    </div>
  </div>
</template>