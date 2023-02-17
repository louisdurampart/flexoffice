<template>
    <b-row class="text-center">
      <b-container class="bv-example-row" id="Email">
        <b-row align-h="start">
          <b-col cols="3"></b-col>
          <b-col cols="6">
            <b-card elevation="2" outlined shaped class="mx-auto my-12">
              <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Flex Office</h1>
  
              <form v-on:submit.prevent="Email">
                <b-row class="text-center justify-content-md-center">
                  <label for="inputEmail" type="email" class="pt-4">rentrer votre adresse email</label>
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
  
  <script>
import axios from "axios";

export default {
  name: "Email",

  data() {
    return {
      // données utilisateurs
      form: {
        inputEmail: "",
       
      },
      allData: "",
      erreur: ""
      // errored: false
    };
  },

  methods: {
    //permet la vérification de l'utilisateur
    Email: function() {
      var self = this;
      axios
        .post("https://flex.sii-lemans.fr/api/MotDepasseEmail.php", this.form)
        .then(response => {
        })
        .catch(error => {
          console.log(error);
          // this.errored = true
        })
        
    }
    
  }
};
</script>


