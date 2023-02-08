<template>
    <div class="Email">
      <MotDepasse msg="Welcome to Your Vue.js App"/>
    </div>
  </template>
  
  <script>
  // @ is an alias to /src
  import Email from '@/components/Email.vue'
  
  export default {
    name: 'Email',
    components: {
        Email
    }
  }
  </script>
  