import { ref } from 'vue'

const toast = ref({ message: '', type: '' })

export function useToast() {
  const showToast = (message, type = 'success') => {
    toast.value = { message, type }

    setTimeout(() => {
      toast.value = { message: '', type: '' }
    }, 3000)
  }

  return { toast, showToast }
}