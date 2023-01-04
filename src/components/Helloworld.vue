<template>
  <b-row class="text-center">
  
    <b-container class="bv-example-row" id="Helloword"  >
<b-row align-h="start">
  <b-col cols="8" ><b-card elevation="2" outlined shaped class="mx-auto my-12" >
      <b-col class="mb-6">
        <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">
          Flex Office
        </h1>
      </b-col>
      <b-col class="mb-6" cols="12">
        <form v-on:submit.prevent="fetchAllData" >
          <label for="inputEmail" type="email"   >Email : </label>
            <input id="inputEmail" placeholder="Identifiant SII" elevation="4" v-model="form.inputEmail" />
          
          <b-col class="mb-6" cols="12">
            <label for="inputMdp" type="mdp" >Mot de passe : </label>
            <input id="inputMdp" placeholder="Mot de passe" elevation="4" v-model="form.inputMdp"  />
          </b-col>
            <b-col class="mb-6" cols="12">
            <v-btn class="pa-2 ml-auto" color="accent" elevation="4" type="submit" outlined rounded>Se connecter</v-btn>
          </b-col>
          </Form>
       
        <router-link to="/Creation"><a class="pa-2"> créez un compte</a></router-link>
         <router-link to="/Selection_Batiment"> 
<p>redirection temp </p>
          </router-link> 
       
       
      </b-col>

      <b-col class="mb-5" cols="12">
        <div id="my-container">
  <div class="my-3">
    <!-- Our triggering (target) element -->
    <b-button id="popover-reactive-1" variant="primary" ref="button">
     Mot de passe oublié
    </b-button>
  </div>
    
</div>
        </b-col>
       
    </b-card>
    <!-- <b-img thumbnail fluid src="../assets/accueil.png" alt="Image 1"></b-img> -->
    </b-col>
  
</b-row>
</b-container>
    
<!-- <b-row>
  <div class="panel body">
      <div classe="table-responsive">
        <table class="table table-bordered table-striped">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">email</th>
      <th scope="col">mot de passe</th>
    </tr>
    <tr v-for="row in allData" v-bind:key="row.id">
<td>{{ row.UtilisateurID }}</td>
<td>{{ row.Nom }}</td>
<td>{{ row.Prenom }}</td>
<td>{{ row.Email }}</td>
<td>{{ row.MotDePasse }}</td>
    </tr>
  </table>
  </div>
</div>
</b-row> -->
</b-row>

</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

import axios from 'axios';


export default {
 
name: 'HelloWorld',

data() {
  return {
      // données utilisateurs
      form:{
      inputMdp: '',
      inputEmail: '',
      },
      allData:'',
      getters:'',
      email:'',
     // errored: false
    }
  }, 

mounted () {
   console.log(this.$store.state.user.email);
},
methods: {
   //permet la vérification de l'utilisateur
   fetchAllData:function(){
    var self = this;
    
    //appel l'action fetchall du fichier action.php 
     axios.post('http://localhost/test/connexion.php',this.form)
     .then(function(response){
      //changement de la valeur du mail
      this.$store.commit({
       type: "changeemail",
       newName: "test"
       //{{ row.email }}
});
     // this.$errored,
      console.log(response)
      self.allData = response.data;
     })
     .catch(error => {
        console.log(error)
       // this.errored = true
        
      })
      //ce qui se passe après l'appel mettre la redirection
  .finally(() => {
    //if (errored=false){
        this.$router.push('/Selection_Batiment')
    //  }
                 })
   },
  
   submit() {
      this.$emit("submit", {
        email: this.email,
        password: this.password
      });
    },
},
mainProps: { blank: true, blankColor: '#777', width: 300, height: 525, class: 'm1' }

}

</script>
