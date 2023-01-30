<template>
  <div id="toolbar-info">
    <v-app-bar dark color="indigo darken-3" clipped-left app>

      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title @click="goHome">Le Mans Flexoffice</v-toolbar-title>
      <v-app-bar-nav-icon>
        <b-img v-bind="logo" src="../assets/SIIlogo.svg"></b-img>
      </v-app-bar-nav-icon>
      <v-spacer></v-spacer>
      <v-toolbar-title @click="goProfile">{{nom}}</v-toolbar-title>
        <v-toolbar-title @click="goProfile">{{prenom}}</v-toolbar-title>
      <v-btn icon>
        <v-icon @click="goProfile"  v-if="this.$store.state.email !== ''">mdi-account-circle</v-icon>
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" absolute bottom temporary>
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
          <v-list-item @click="goHome">
            <v-list-item-title >Home</v-list-item-title>
          </v-list-item>

          <v-list-item @click="goreservation"  v-if="this.$store.state.email !== ''">
            <v-list-item-title>Mes Réservation</v-list-item-title>
          </v-list-item>

          <v-list-item @click="gobatiment"  v-if="this.$store.state.email !== ''">
            <v-list-item-title>Faire une réservation</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

  <script>
  import { mapState, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["nom", "prenom", "email"])
  },
  name: "myToolbar",

  data() {
    return {
      email: "",
      drawer: false,
      group: null,
      logo: { width: 30, height: 30, class: "m1" }
    };
  },

  methods: {
    goHome() {
      this.$router.replace("/");
    },
    goProfile() {
      this.$router.replace("/Monprofil");
    },
    goreservation() {
      this.$router.replace("/Reservation");
    },
    gobatiment() {
      this.$router.replace("/Selection_Batiment");
    }
  }
};
</script>

