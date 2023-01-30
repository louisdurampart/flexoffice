<template>
  <div id="toolbar-info">
    <v-app-bar dark color="indigo darken-3" clipped-left app>

      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title @click="goHome">Le Mans Flexoffice</v-toolbar-title>
      <v-app-bar-nav-icon>
        <b-img v-bind="logo" src="../assets/SIIlogo.svg"></b-img>
      </v-app-bar-nav-icon>
      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-account-circle</v-icon>
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
  import { mapState, mapGetters } from "vuex";
  <script>
export default {
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
    goreservation() {
      this.$router.replace("/Reservation");
    },
    gobatiment() {
      this.$router.replace("/Selection_Batiment");
    }
  }
};
</script>

