<template>
  <b-container>
  <div class="Selection_Bureau">
    
    <form v-on:submit.prevent="reservation">
      <b-row class="text-center">
        <b-col class="mb-6" cols="12" height>
          <h2>Votre Réservation</h2>
        </b-col>
      </b-row>
      <!-- 
      <b-row class="justify-content-md-center">
        <b-col class="mb-6" cols="3" height>
          <label>Votre salle :  </label>
        </b-col>
        <b-col class="mb-6" cols="3" height>
          <label>Votre bureau :  </label>
      </b-col>
      </b-row>-->
      <b-row class="justify-content-xl-center" style="display: flex;">
        <b-col class="mb-5" cols="4" height>
         <b-row>
          <select
            v-model="form.BureauID"
            @change="bureau"
            class="custom-select"
            style="width:200px;"
            name="salle"
            id="BureauID"
          >
            <option disabled value>Choisissez une salle</option>
            <option value="1">Virage indianapolis</option>
            <option value="2">Virage de mulsanne</option>
            <option value="3">Ralentisseur michelin</option>
            <option value="4">Ralentisseur playstation</option>
            <option value="5">Virage du tertre rouge</option>
            <option value="6">Virage ford</option>
            <option value="7">Virage du karting</option>
            <option value="8">Virage porsche</option>
          </select>
        </b-row>
        <b-row>
          <b-img width="250" fluid src="../assets/bureau2nom.png"  v-if="form.BureauID === ''"></b-img>
          <b-img width="500" fluid src="../assets/plans/plan1.png"  v-if="form.BureauID === '1'"></b-img>
          <b-img width="500" fluid src="../assets/plans/plan2.png"  v-if="form.BureauID === '2'"></b-img>
          <b-img width="500" fluid src="../assets/plans/plan3.png"  v-if="form.BureauID === '3'"></b-img>
          <b-img width="500" fluid src="../assets/plans/plan4.png" v-if="form.BureauID === '4'"></b-img>
          <b-img width="300" fluid src="../assets/plans/plan5.png"  v-if="form.BureauID === '5'"></b-img>
          <b-img width="300" fluid src="../assets/plans/plan6.png"  v-if="form.BureauID === '6'"></b-img>
          <b-img width="250" fluid src="../assets/plans/plan7.png"  v-if="form.BureauID === '7'"></b-img>
          <b-img width="500" fluid src="../assets/plans/plan8.png"  v-if="form.BureauID === '8'"></b-img>

          </b-row>
        </b-col>
        <b-col class="mb-5" cols="4">
          <b-row>
          <select
            v-model="form.RessourceID"
            class="custom-select"
            style="width:200px;"
            name="bureau"
            id="RessourceID"
            @change="getBureau()"
          >
            <option disabled value>Choisissez un bureau</option>
            <option
              v-for="(row,index) in allData"
              :key="index"
              :value="row.RessourceID"
            >{{ row.Nom }}</option>
          </select>
        </b-row>
        <b-row>
          <b-img width="250" height="auto" fluid src="../assets/bureau1nom.png" v-if="form.BureauID === ''"></b-img>
          <b-img width="250" height="auto" fluid src="../assets/bureau1nom.png" v-if="form.BureauID >= '1' && form.BureauID <='4' "></b-img>
          <b-img width="250" height="auto" fluid src="../assets/bureau2nom.png" v-if="form.BureauID >= '5' && form.BureauID <='8' "></b-img>
        </b-row>
        </b-col>
        <b-col class="mb-2" cols="4" v-if="current_bureau !== null" >

     
          <b-card-body class="card">
      <b-card-title>Mon Bureau</b-card-title>
      <b-card-sub-title class="mb-2">équipements proposés par le bureau</b-card-sub-title>
      <b-list-group flush>
        <b-list-group-item>Bureau levant : {{ bureauLevant }} </b-list-group-item>
      <b-list-group-item>Nombre  de réplicateurs : {{  current_bureau.NombreRéplicateur}}</b-list-group-item>
      <b-list-group-item>Nombre d'écran : {{ current_bureau.NombreEcran}}</b-list-group-item>
      <b-list-group-item>Nombre de clavier :{{ current_bureau.NombreClavier }}</b-list-group-item>
      <b-list-group-item>Nombre de souris : {{ current_bureau.NombreSouris }}</b-list-group-item>
    </b-list-group>
    </b-card-body>

         
          </b-col>
      </b-row>
      
      <b-row class="text-center">
        <b-col v-if="current_bureau !== null" class="mb-6" cols="12">
          <h2>Votre Sélection de bureau </h2>
        </b-col>
      </b-row>

      <b-row v-if="current_bureau !== null" class="text-center">
        <b-col class="mb-6" cols="12">
          <p>Je réserve le {{ current_bureau.Nom }} Du {{ dateDebut}} au {{ dateFin}} </p>
          <!-- <router-link to="/"> -->
          <v-btn  elevation="4" outlined rounded @click="reservation">Je réserve</v-btn>
          <!-- </router-link> -->
        </b-col>
      </b-row>
    </form>
  </div>
</b-container>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["dateDebut", "dateFin"])
  },
  data() {
    return {
      form: {
        BureauID: "",
        RessourceID: ""
      },

      allData: "",
      allData2: "",
      selected: "aucun bureau",
      dateDebut: this.$store.state.date_debut,
      dateFin: this.$store.state.date_fin,
      date_debut: "",
      date_fin: "",
      current_bureau: null
    };
  },

  methods: {
    //permet la récupération de tous les utilisateurs
    bureau: function() {
      if(this.$store.state.UtilisateurID === ""){
        this.$store.commit("changeerreur", 'Erreur lors de la sélection des bureaux, vous n\'êtes pas connecté !');
        this.$router.push("/");
      }
      else{
      var self = this;
      let params = {
        id: this.form.BureauID,
        date_debut: this.$store.state.date_debut,
        date_fin: this.$store.state.date_fin
      }
      axios
        .get('https://flex.sii-lemans.fr/api/bureau.php',{params}
          //`http://flex.sii-lemans.fr/api/bureau.php?id=${this.form.BureauID}&date_debut=${this.$store.state.date_debut}&date_fin=${this.$store.state.date_fin}`
           //"http://flex.sii-lemans.fr/api/bureau.php?id= date_debut= date_fin= " + this.form.BureauID ,this.$store.state.date_debut, this.$store.state.date_fin
          //"http://flex.sii-lemans.fr/api/bureau.php?id=" ,body
        )
        // axios.get('http://localhost/test/bureau.php',)
        .then(function(response) {
          console.log(response.data);
          self.allData = response.data;
        });
      }
    },

    getBureau: function() {
      this.current_bureau = this.allData.find(
        nomBureau => nomBureau.RessourceID == this.form.RessourceID
      );
    },
    reservation: function() {
      var self = this;

      let body = {
        ...this.form,
        // RessourceID:
        ...{
          UtilisateurID: this.$store.state.UtilisateurID,
          date_debut: this.$store.state.date_debut,
          date_fin: this.$store.state.date_fin
        }
      };
      
      console.log(body);
      axios
        .post("https://flex.sii-lemans.fr/api/insert_resa.php", body)

        .then(response => {
          console.log(response);
          self.allData2 = response.data;
          this.$router.push("/Reservation");
        });
      }
    },
    computed : {
      bureauLevant(){
        return this.current_bureau.Levant > 0 ? "oui" :"non"
      }
    }
};
</script>
<style scoped>
.custom-select {
  position: relative;
  font-family: Arial;
  background-color: rgb(2, 77, 151);
  border: 6px;
  color: aliceblue;
  border-color: #fff transparent transparent transparent;
}
.card {
 border:1px dotted black;
 }
</style>