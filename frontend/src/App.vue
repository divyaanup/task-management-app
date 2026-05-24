<script setup>
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'
</script>

<template>
  <div class="min-h-screen flex flex-col w-full">

    <AppHeader />

    <main class="flex-1 w-full px-6 py-6">
      <router-view />
    </main>

    <AppFooter />

  </div>
</template>