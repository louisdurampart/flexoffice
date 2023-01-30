<template>
    <div class="Monprofil">
        <b-row class="text-center">
      <b-col class="mb-6" cols="12">
        <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Mon profil</h1>
        <p>Nom : {{ nom}}</p>
        <p>Prénom : {{ prenom}}</p>
        <p>Email : {{ email}}</p>
      </b-col>
    </b-row>
  </div>
  </template>
<script>
import Monprofil from '@/components/Monprofil.vue'
import { mapState, mapGetters } from "vuex";
export default {
    computed: {
    ...mapGetters(["nom", "prenom", "email"])
  },
  name: 'Monprofil',
  components: {
    Monprofil
  }
}
</script>