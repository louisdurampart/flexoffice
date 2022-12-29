<template> 
  <div class="Reservation">
      <b-row align-h="center">
        <b-col cols="4" > 
           <h1>Mes Réservations</h1>
           <button @click="reservation">Afficher les réservations</button>
        </b-col>
      </b-row>


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
<td> supprimer</td>
    </tr>
  </table>
  </div>
</div>
</b-col>
    </div>
</template>

<script>

import axios from 'axios';
export default {
  data() {
    return {  
     UtilisateurID:'1',    
     allData:''  
    }
    
  },
  methods: {
 //permet la récupération de tous les utilisateurs
 reservation:function(){
  
  var self = this;
  //appel l'action fetchall du fichier action.php 
   axios.get('http://localhost/test/read_resa.php',{
     action:'fetchall',
   }).then(function(response){
    
    console.log(response)
    self.allData = response.data;
    
   });
 },

},
}
</script>