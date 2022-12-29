<template>
  <div class="Creation">
  
</div>
</template>

<script>
export default {
  name: ['Creation'],
  data: function () {
    return {
      drawer: false,
      logo: {  width: 50, height: 50, class: 'm1' },
    }
  },
  

 
  methods: {
    goHome () {
      this.$router.replace('/')
    }
  }
}
</script>
