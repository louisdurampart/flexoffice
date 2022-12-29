<template>
    <div id="toolbar-info">
      <v-app-bar dark color="indigo darken-3" clipped-left app>
        <v-app-bar-nav-icon><b-img  thumbnail v-bind="logo" src="../assets/sii.png" ></b-img>
</v-app-bar-nav-icon>
        <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>|
      <router-link to="/Reservation">Mes Rèservations</router-link>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title @click="goHome" class="white--text"> Le Mans Flex Office</v-toolbar-title>
      </v-app-bar>
    </div>
    
  </template>
  
  <script>
  export default {
    name: 'myToolbar',
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

