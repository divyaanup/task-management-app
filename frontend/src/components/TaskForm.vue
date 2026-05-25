<script setup>
defineProps({
  form: Object,
  errors: Object,
  onSubmit: Function
})
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="flex flex-col">
      <input v-model="form.name" class="border p-3 rounded" />
      <p v-if="errors?.name" class="text-red-500 text-sm mt-1">
        {{ errors.name }}
      </p>
    </div>

    <div class="flex flex-col">
      <input v-model="form.due_date" type="date" class="border p-3 rounded" />
      <p v-if="errors?.due_date" class="text-red-500 text-sm mt-1">
        {{ errors.due_date }}
      </p>
    </div>

    <textarea v-model="form.description" class="border p-3 rounded md:col-span-3" />

    <button @click="onSubmit" class="bg-gray-500 text-white px-4 py-3 rounded">
      Add Task
    </button>

  </div>
</template>