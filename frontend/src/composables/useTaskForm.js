import { reactive } from 'vue'

export function useTaskForm() {
  const form = reactive({
    name: '',
    due_date: '',
    description: '',
    errors: {
      name: '',
      due_date: ''
    }
  })

  const resetForm = () => {
    form.name = ''
    form.due_date = ''
    form.description = ''
    form.errors = { name: '', due_date: '' }
  }

  const setErrors = (errors) => {
    form.errors = errors
  }

  return {
    form,
    resetForm,
    setErrors
  }
}