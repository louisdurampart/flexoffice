<template> 
  <div class="Reservation">
      <b-row align-h="center">
        <b-col cols="4" > 
           <h1>Mes Réservations</h1>
           <button @click="reservation">Afficher les réservations</button>
        </b-col>
      </b-row>

      <p class="color">{{ this.$store.state.confirmation }}</p>
      <b-col cols="8" > 
      <div class="panel body">
      <div classe="table-responsive">
        <table class="table table-bordered table-striped">
    <tr>
      <th scope="col">Date Debut de réservation</th>
      <th scope="col">Date Fin de réservation</th>
      <th scope="col">Nom du Bureau</th>
      <th scope="col">nom de la salle</th>
    </tr>
    <tr v-for="row in allData" v-bind:key="row.id">
<td>{{ row.DateDebut }}</td>
<td>{{ row.DateFin }}</td>
<td>{{ row.NomRessource }}</td>
<td>{{ row.Nom }}</td>
<td>
<button @click="suppression(row.ReservationID)" > supprimer</button>
</td>
    </tr>
  </table>
  </div>
</div>
</b-col>
    </div>
</template>

<script>

import axios from 'axios';
import { mapState, mapGetters } from "vuex";
export default {
  data() {
    return {  
     UtilisateurID:'1',    
     ReservationID:'',
     allData:''  
    }
    
  },
  methods: {
 //permet la récupération de tous les utilisateurs
 reservation:function(){
  var self = this;
  
      axios
        .get("https://flex.sii-lemans.fr/api/read_resa.php?id="+this.$store.state.UtilisateurID,)
        // axios.get('http://localhost/test/bureau.php',)
        .then(function(response) {
          console.log(response);
          self.allData = response.data;
        });
    },
 suppression:function(id){
  
  var self = this;
  //appel l'action fetchall du fichier action.php 
   axios.delete('https://flex.sii-lemans.fr/api/sup_resa.php?id='+id)
   .then((response)=>{
    this.$store.commit("changeconfirmation", 'Votre réservation a bien été annuler');
   // PK ça marche pas ici ? a vérifier
    console.log(response)
    self.allData = response.data;
    
   });
 },
},


}
</script>

<style scoped>
.color {
  position: relative;
  font-family: Arial;
  border: 3px;
  color: rgb(34, 185, 34);
}

</style>