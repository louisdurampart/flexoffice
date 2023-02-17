<template>
  <b-row class="text-center">
    <b-container class="bv-example-row" id="Helloword">
      <b-row align-h="start">
        <b-col cols="3"></b-col>
        <b-col cols="6">
          <b-card elevation="2" outlined shaped class="mx-auto my-12">
            <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Flex Office</h1>

            <form v-on:submit.prevent="fetchAllData">
              <b-row class="text-center justify-content-md-center">
                <label for="inputEmail" type="email" class="pr-4">Email </label>
              </b-row>
              <b-row class="text-center justify-content-md-center">
                <input class="test form-control rounded" id="inputEmail" placeholder="Identifiant SII" elevation="4"
                  v-model="form.inputEmail" />
              </b-row>


              <b-row class="text-center justify-content-md-center">
                <label for="inputMdp" type="mdp" class="pt-4">Mot de passe</label>
              </b-row>
              <b-row class="text-center justify-content-md-center">
                <input class="test form-control rounded" id="inputMdp" placeholder="Mot de passe" elevation="4"
                  v-model="form.inputMdp" type="password" />
              </b-row>


              <p class="color">{{ erreur }} {{ this.$store.state.erreur }}</p>
              <b-col class="mb-6" cols="12">
                <v-btn class="pa-2 ml-auto" color="accent" elevation="4" type="submit" outlined rounded>Se
                  connecter</v-btn>
              </b-col>
            </form>

            <!-- <router-link to="/Creation"> -->
            <!-- <router-link to="/">
                <a class="pa-2">créez un compte (In comming)</a>
              </router-link>
              -->


             <!-- <b-col class="mb-5" cols="12">
              <div id="my-container">
                <div class="my-3">
                 
                  <b-button
                    id="popover-reactive-1"
                    variant="primary"
                    ref="button"
                    @click="Motdepasse"
                  >Mot de passe oublié </b-button>
                </div>
              </div>
            </b-col>  -->
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

          if(response.data.Email){
            this.$store.commit("changeutilisateurID", response.data.UtilisateurID);
          this.$store.commit("changeemail", response.data.Email);
          this.$store.commit("changenom", response.data.Nom);
          this.$store.commit("changeprenom", response.data.Prenom);

          axios .post("https://flex.sii-lemans.fr/api/derniereresa.php", this.form)
          .then(response => {
            console.log(response.data);
            this.$store.commit("changeBureauID", response.data.SalleId);
            this.$store.commit("changeRessourceID", response.data.RessourceID);
            this.$store.commit("changeNomsalle", response.data.NomSalle);
          })
          this.$router.push("/Selection_Batiment")
          }   // si l'email est pas null
            else{
              this.erreur = //sinon on renvoi le message d'erreur
                "Mot de passe ou Email incorect. Veuillez réessayer."
            }   
         // console.log(response.data.Email);
          // this.$errored,
          self.allData = response.data;
        })
        .catch(error => {
          console.log(error);
          // this.errored = true
        })
        
    },
    Motdepasse: function() {
      this.$router.push("/Email")
    },
    
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

.test {
  border: solid 2px #82b1ff;
  height: 30px;
  width: 200px;
}
</style>
