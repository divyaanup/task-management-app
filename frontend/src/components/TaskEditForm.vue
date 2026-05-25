<script setup>
defineProps({
  editingTask: {
    type: Object,
    required: true
  },
  editErrors: {
    type: Object,
    required: true
  }
})

const emit = defineEmits([
  'update',
  'cancel'
])
</script>

<template>
  <div class="bg-slate-50 p-6 rounded-xl shadow mb-6">
    <h2 class="text-xl font-bold mb-4">
      Edit Task
    </h2>

    <!-- TASK NAME -->
    <input
      v-model="editingTask.name"
      class="border p-2 w-full mb-1"
      placeholder="Task name"
    />

    <p
      v-if="editErrors.name"
      class="text-red-500 text-sm mb-2"
    >
      {{ editErrors.name }}
    </p>

    <!-- DUE DATE -->
    <input
      v-model="editingTask.due_date"
      type="date"
      class="border p-2 w-full mb-1"
    />

    <p
      v-if="editErrors.due_date"
      class="text-red-500 text-sm mb-2"
    >
      {{ editErrors.due_date }}
    </p>

    <!-- DESCRIPTION -->
    <textarea
      v-model="editingTask.description"
      class="border p-2 w-full mb-2"
      placeholder="Task description"
      rows="4"
    ></textarea>

    <!-- STATUS -->
    <select
      v-model="editingTask.status"
      class="border p-2 w-full mb-4"
    >
      <option value="active">
        Active
      </option>

      <option value="completed">
        Completed
      </option>
    </select>

    <!-- ACTIONS -->
    <div class="flex gap-2">
      <button
        @click="emit('update')"
        class="bg-green-600 text-white px-4 py-2 rounded"
      >
        Save
      </button>

      <button
        @click="emit('cancel')"
        class="bg-gray-400 text-white px-4 py-2 rounded"
      >
        Cancel
      </button>
    </div>
  </div>
</template>