<template>
  <b-row class="text-center">
    <b-container class="bv-example-row" id="Helloword">
      <b-row align-h="start">
        <b-col cols="12">
          <b-card elevation="2" outlined shaped class="mx-auto my-12">
            <b-col class="mb-6">
              <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Flex Office</h1>
            </b-col>
            <b-col class="mb-6" cols="12">
              <form v-on:submit.prevent="fetchAllData">
                <label for="inputEmail" type="email">Email :</label>
                <input
                  id="inputEmail"
                  placeholder="Identifiant SII"
                  elevation="4"
                  v-model="form.inputEmail"
                />

                <b-col class="mb-6" cols="12">
                  <label for="inputMdp" type="mdp">Mot de passe :</label>
                  <input
                    id="inputMdp"
                    placeholder="Mot de passe"
                    elevation="4"
                    v-model="form.inputMdp"
                    type="password"
                  />
                </b-col>
                <p class="color">{{ erreur }} {{ this.$store.state.erreur }}</p>
                <b-col class="mb-6" cols="12">
                  <v-btn
                    class="pa-2 ml-auto"
                    color="accent"
                    elevation="4"
                    type="submit"
                    outlined
                    rounded
                  >Se connecter</v-btn>
                </b-col>
              </form>

              <!-- <router-link to="/Creation"> -->
              <!-- <router-link to="/">
                <a class="pa-2">créez un compte (In comming)</a>
              </router-link>
              -->
            </b-col>

            <!-- <b-col class="mb-5" cols="12">
              <div id="my-container">
                <div class="my-3">
                 
                  <b-button
                    id="popover-reactive-1"
                    variant="primary"
                    ref="button"
                  >Mot de passe oublié (In comming)</b-button>
                </div>
              </div>
            </b-col> -->
          </b-card>
          <!-- <b-img thumbnail fluid src="../assets/accueil.png" alt="Image 1"></b-img> -->
        </b-col>
      </b-row>
    </b-container>
  </b-row>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import axios from "axios";

export default {
  name: "HelloWorld",

  data() {
    return {
      // données utilisateurs
      form: {
        inputMdp: "",
        inputEmail: ""
      },
      allData: "",
      erreur: ""
      // errored: false
    };
  },

  methods: {
    //permet la vérification de l'utilisateur
    fetchAllData: function() {
      var self = this;
      axios
        .post("https://flex.sii-lemans.fr/api/connexion.php", this.form)
        .then(response => {
          //changement de la valeur du mail
          this.$store.commit("changeutilisateurID", response.data.UtilisateurID);
          this.$store.commit("changeemail", response.data.Email);
          this.$store.commit("changenom", response.data.Nom);
          this.$store.commit("changeprenom", response.data.Prenom);

          this.$store.state.email  // si l'email est pas null
            ? this.$router.push("/Selection_Batiment")
            : (this.erreur = //sinon on renvoi le message d'erreur
                "Mot de passe ou Email incorect. Veuillez réessayer.");
         // console.log(response.data.Email);
          // this.$errored,
          self.allData = response.data;
        })
        .catch(error => {
          console.log(error);
          // this.errored = true
        })
        
    }
  }
};
</script>

<style scoped>
.color {
  position: relative;
  font-family: Arial;
  border: 3px;
  color: rgb(182, 23, 23);
}
</style>
