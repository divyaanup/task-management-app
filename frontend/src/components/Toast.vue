<script setup>
import { useToast } from '../composables/useToast'

const { toast } = useToast()
</script>
<template>
  <div v-if="toast.message"
       :class="toast.type === 'success'
         ? 'bg-green-100 text-green-700'
         : 'bg-red-100 text-red-700'"
       class="p-3 rounded mb-4">
    {{ toast.message }}
  </div>
</template>