<template>
  <div id="toolbar-info">
    <v-app-bar dark color="indigo darken-3" clipped-left app>
     
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" v-if="this.$store.state.email !== ''"></v-app-bar-nav-icon>
      <b-img  src="../assets/SIIlogo.svg"></b-img>
      <v-toolbar-title @click="gobatiment" >Le Mans Flexoffice</v-toolbar-title>
        
      <v-spacer></v-spacer>
      <v-toolbar-title @click="goProfile"> {{ nom }} </v-toolbar-title>
      <span>&nbsp;</span>
        <v-toolbar-title @click="goProfile">{{ prenom }}</v-toolbar-title>
      <v-btn icon>
        <v-icon @click="goProfile" v-if="this.$store.state.email !== ''" >mdi-account-circle</v-icon>
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" absolute bottom temporary v-if="this.$store.state.email !== ''">
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
          <v-list-item @click="goHome">
            <v-list-item-title >Déconnexion</v-list-item-title>
          </v-list-item>

          <v-list-item @click="goreservation"  >
            <v-list-item-title>Mes Réservation</v-list-item-title>
          </v-list-item>

          <v-list-item @click="gobatiment"  >
            <v-list-item-title>Faire une réservation</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

  <script>
  import {  mapGetters } from "vuex";
  
export default {
  computed: {
    ...mapGetters(["nom", "prenom", "email"])
  },
  name: "myToolbar",

  data() {
    return {
      
      drawer: false,
      group: null,
      logo: { width: 35, height: 35, class: "m1" }
    };
  },

  methods: {
    goHome() {
      this.$store.commit("changeemail", "");
      this.$store.commit("changenom","");
          this.$store.commit("changeprenom","");
          this.$store.commit("changeerreur",""),
          this.$store.commit("changeerreurresa","")
      this.$router.replace("/");
    },
    goProfile() {
      this.$router.replace("/Monprofil");
    },
    goreservation() {
      this.$router.replace("/Reservation");
    },
    gobatiment() {
      
      this.$store.commit("changeconfirmation","");
      this.$store.commit("changeerreurresa","");
      this.$router.replace("/Selection_Batiment");
    }
  }
};
</script>

