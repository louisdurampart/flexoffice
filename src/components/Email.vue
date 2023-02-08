<template>
    <b-row class="text-center">
      <b-container class="bv-example-row" id="Email">
        <b-row align-h="start">
          <b-col cols="3"></b-col>
          <b-col cols="6">
            <b-card elevation="2" outlined shaped class="mx-auto my-12">
              <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Flex Office</h1>
  
              <form v-on:submit.prevent="fetchAllData">
              
  
                <b-row class="text-center justify-content-md-center">
                  <label for="inputEmail" type="mdp" class="pt-4">Nouveau Mot de passe</label>
                </b-row>
                <b-row class="text-center justify-content-md-center">
                  <input class="test form-control rounded" id="inputEmail" placeholder="Mot de passe" elevation="4"
                    v-model="form.inputEmail"  />
                </b-row>

                <b-row class="text-center justify-content-md-center">
                <v-btn class="pa-2 ml-auto" color="accent" elevation="4" type="submit" outlined rounded>Validation Email</v-btn>
                  </b-row>
              </form>
            </b-card>
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
        inputNouveauMdp: "",
        inputValidationMdp: ""
      },
      allData: "",
      erreur: ""
      // errored: false
    };
  },

  methods: {
    //permet la vérification de l'utilisateur
    Motdepasse: function() {
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
        
    }
    
  }
};
</script>


