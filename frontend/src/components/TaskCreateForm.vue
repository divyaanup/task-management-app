<script setup>
const props = defineProps({
  name: String,
  due_date: String,
  description: String,
  errors: Object
})

const emit = defineEmits([
  'update:name',
  'update:due_date',
  'update:description',
  'submit'
])
</script>

<template>
  <div class="bg-white p-6 rounded-xl shadow mb-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

      <!-- TASK NAME -->
      <div class="flex flex-col">
        <input
          :value="name"
          @input="emit('update:name', $event.target.value)"
          placeholder="Task name"
          class="border p-3 rounded"
        />

        <p
          v-if="errors.name"
          class="text-red-500 text-sm mt-1"
        >
          {{ errors.name }}
        </p>
      </div>

      <!-- DUE DATE -->
      <div class="flex flex-col">
        <input
          :value="due_date"
          @input="emit('update:due_date', $event.target.value)"
          type="date"
          class="border p-3 rounded"
        />

        <p
          v-if="errors.due_date"
          class="text-red-500 text-sm mt-1"
        >
          {{ errors.due_date }}
        </p>
      </div>

      <!-- DESCRIPTION -->
      <textarea
        :value="description"
        @input="emit('update:description', $event.target.value)"
        placeholder="Task description"
        class="border p-3 rounded md:col-span-3"
        rows="4"
      ></textarea>

      <!-- BUTTON -->
      <button
        @click="emit('submit')"
        class="bg-gray-500 text-white rounded px-4 py-3 md:col-span-1"
      >
        Add Task
      </button>

    </div>
  </div>
</template>