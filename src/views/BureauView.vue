<template>
  
    <div class="Selection_Bureau">

      <b-row class="text-center">
        <b-col class="mb-6" cols="12" height="">
          <h2>Votre Réservation</h2>
        </b-col>
        </b-row>
        <b-row class="text-center">
          <b-col class="mb-6" cols="2" height="">


            <!-- <select v-model="selected">
  <option disabled value="allo">Please select one</option>
  <option>A</option>
  <option>B</option>
  <option>C</option>
</select> -->

        <b-dropdown v-model="BureauID" id="BureauID" text="Sélection de la salle" variant="primary" class="m-2">
          
          <b-dropdown-item @click="bureau" value="1">virage indianapolis</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="2">virage de mulsanne</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="3">ralentisseur michelin</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="4">ralentisseur playstation</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="5">virage du tertre rouge</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="6">virage ford</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="7">virage du karting</b-dropdown-item>
          <b-dropdown-item @click="bureau" value="8">virage porsche</b-dropdown-item>
        
        </b-dropdown>
        </b-col>
        <b-col class="mb-6" cols="3" height="">
        
          <select v-model="selected">
  <option disabled value="">Choisissez</option>
  <option v-for="row in allData" v-bind:key="row.id">{{ row.Nom }}</option>
</select>
</b-col>
<b-col class="mb-6" cols="3" height="">
          <b-dropdown v-model="selected" id="RessourceID" text="Bureaux de la salle" variant="primary" class="m-2" >
            <b-dropdown-item v-for="row in allData" v-bind:key="row.id">{{ row.Nom }}</b-dropdown-item>
          </b-dropdown>
          <!-- <div class="panel body">
      <div classe="table-responsive">
        <table class="table table-bordered table-striped">
    <tr>
      <th scope="col">Nom</th>
    </tr>
    <tr v-for="row in allData" v-bind:key="row.id">
<td>{{ row.Nom }}</td>
    </tr>
  </table>
  </div>
</div> -->
        </b-col>
      </b-row>
      <b-row class="text-center">
        <b-col class="mb-6" cols="6">
          <b-img  width="600"  b-bind="mainProps" fluid src="../assets/plans/room-01.png" alt="Image 1"></b-img>
        </b-col>
          <b-col class="mb-6" cols="6">
            <b-img  width="500" height="auto" b-bind="mainProps" fluid src="../assets/images_reelles/room-01.jpg" alt="Image 1"></b-img>
          </b-col>
      </b-row>
      <b-row class="text-center">
          <b-col class="mb-6" cols="12">
            <h2>Votre Sélection de bureau</h2>
          
          </b-col>
      </b-row>
      <b-row class="text-center">
       
        <b-col class="mb-6" cols="12">       
            <p>{{ selected }}  test Du 17/09/2022 au 18/09/2022</p>
            <!-- <router-link to="/"> -->
            <v-btn  color="accent" elevation="4" outlined rounded @click="reservation">Je réserve</v-btn>
            <!-- </router-link> -->
          </b-col>
      </b-row>
    </div>
</template>

<script>
import axios from 'axios';
  export default {
    data() {
      return {
        
        allData:'',
        allData2:'',
        BureauID:'',
        selected:'',  
        date_debut:'',
        date_fin:'',
        RessourceID:'',
      }      
    },
    
    methods: {
   //permet la récupération de tous les utilisateurs
   bureau:function(){
    var self = this;
     axios.get('http://localhost/test/bureau.php',)
    // axios.get('http://localhost/test/bureau.php',this.form)
     .then(function(response){
      console.log(response)
      self.allData = response.data;
      
     });
   },
   reservation:function(){
    var self = this;
     axios.create('http://localhost/test/insert_resa.php',{
       BureauID:this.$BureauID,
       date_debut:this.$date_debut,
       date_fin:this.$date_fin,
       RessourceID:this.$RessourceID,
     }).then(function(response){
      console.log(response)
      self.allData2 = response.data;
     });
   },
},
  }
</script>
