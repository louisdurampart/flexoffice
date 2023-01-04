<template>
    <div id="toolbar-info">
      <v-app-bar dark color="indigo darken-3" clipped-left app>
        <v-app-bar-nav-icon>
          <b-img  thumbnail v-bind="logo" src="../assets/sii.png" ></b-img>
</v-app-bar-nav-icon>
   
    <v-system-bar color="deep-purple darken-3"></v-system-bar>
    
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title @click="goHome">Le Mans Flexoffice</v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon> mdi-account-circle</v-icon>
      </v-btn>
    </v-app-bar>
        <v-navigation-drawer
      v-model="drawer"
      absolute
      bottom
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
        <v-list-item>
            <v-list-item-title @click="goHome">Home</v-list-item-title>
          </v-list-item>
          
          <v-list-item>
            <v-list-item-title @click="goreservation">Mes Réservation</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title  @click="gobatiment">faire une réservation</v-list-item-title>
          </v-list-item>

        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
     
    </div>
    
  </template>
  
  <script>
  export default {
    name: 'myToolbar',
    data: function () {
      return {
        drawer: false,
        group: null,
        logo: {  width: 50, height: 50, class: 'm1' },
      }
    },
    
    methods: {
      goHome () {
        this.$router.replace('/')
      },
      goreservation(){
        this.$router.replace('/Reservation')
      },
      gobatiment(){
        this.$router.replace('/Selection_Batiment')
      }
    }
  }
  </script>

