<template>
  <div class="Selection_Batiment">
    <!-- <map name="bureau_1">
  <area shape="rect" coords="75,75,75" href="left.html">
  <area shape="circle" coords="275,75,75" href="right.html">
</map>

<map name="bureau_2">
<area shape="rect" coords="0,350,150,250" href="/Selection_Bureau" alt="réunion 2">
  <area shape="rect" coords="0,400,150,600" href="/Selection_Bureau" alt="espace dev">
  <area shape="rect" coords="0,400,150,600" href="/Selection_Bureau" alt="espace dev">
  <area shape="rect" coords="150,280,600,600" href="/Selection_Bureau" alt="espace dev">
    </map>-->

    <!-- <b-row class="text-center">
      <b-col class="mb-6" cols="12">
        <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Le Mans Flex Office</h1>
      </b-col>
    </b-row> -->

    <form v-on:submit.prevent="envoiedata">
      <b-row class="row justify-content-md-center">
        <b-col class="text-center" md="3">
          <label for="date_debut">Date de début :</label>
          <div>
            <b-form-datepicker v-model="date_debut" :date-disabled-fn="dateDisabled" locale="fr"
              placeholder="Choisissez une date" id="date_debut" today-button reset-button
              close-button></b-form-datepicker>
          </div>
        </b-col>
        <b-col class="text-center" md="3">
          <label for="date_fin">Date de fin :</label>
          <div>
            <b-form-datepicker v-model="date_fin" :date-disabled-fn="dateDisabled" locale="fr"
              placeholder="Choisissez une date" id="date_fin" today-button reset-button
              close-button></b-form-datepicker>
          </div>
        </b-col>

      </b-row>

      <div class="mb-6"></div>
      <b-row class="text-center">
        <b-col class="mb-6" cols="12">
          <v-btn color="primary" elevation="4" outlined rounded @click="jour()">Réserver aujourd'hui</v-btn>
          <v-btn color="primary " class="ms-4" elevation="4" outlined rounded @click="semaine()">Réserver la
            semaine</v-btn>
        </b-col>
      </b-row>
      <b-row class="text-center">
        <!-- v-if="this.date_debut !== ''" -->
        <b-col class="mb-6" cols="12"
          v-if="this.date_debut !== '' && this.date_fin >= this.date_debut && this.date_fin !== ''">
          <v-btn color="primary" elevation="4" outlined rounded type="submit">Je valide</v-btn>
        </b-col>
      </b-row>

      <b-row class="ligne " v-if="derniereresa != null"></b-row>
      <b-row b-row class="justify-content-md-center text-center  " v-if="derniereresa != null">
        <h1>Réservation rapide</h1>
      </b-row>
      <b-row b-row class="justify-content-md-center text-center pa-3 " v-if="derniereresa != null">
        <b-col cols="3">

          <div class="card mx-auto" style="width: 18rem;">

            <div class="card-body">
              <h5 class="card-title">Réserver aujourd'hui</h5>
              <p class="card-text">Réserver le dernier bureau que vous avez utilisé</p>
              <v-btn color="primary" elevation="4" outlined rounded @click="resarapide(1)">Réserver aujourd'hui</v-btn>
            </div>
          </div>
        </b-col>
        <b-col cols="3">
          <div class="card mx-auto " style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Réserver la semaine</h5>
              <p class="card-text">Réserver le dernier bureau que vous avez utilisé</p>
              <v-btn color="primary" elevation="4" outlined rounded @click="resarapide(2)">Réserver la semaine</v-btn>
            </div>
          </div>
        </b-col>
        <b-col cols="3">
          <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Réserver le mois</h5>
              <p class="card-text">Réserver le dernier bureau que vous avez utilisé</p>
              <v-btn color="primary" elevation="4" outlined rounded @click="resarapide(3)">Réserver le mois</v-btn>
            </div>
          </div>
        </b-col>
      </b-row>
      <b-row class="ligne "></b-row>
      <b-row b-row class="justify-content-md-center text-center  ">
        <b-col cols="10">
          <v-btn class="ma-4" color="primary" elevation="4" outlined rounded @click="reservation">Afficher mes
            réservations</v-btn>
          <div class="panel body">
            <div class="table-responsive">
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
                </tr>
              </table>
            </div>
          </div>
        </b-col>
      </b-row>

      <div class="mb-6"></div>
      <!-- <b-row class="row justify-content-md-center" margin-top="25px">
        <b-col class="mb-6" cols="3" >
          <label for="BatimentID">Choisissez le batiment :</label>
        </b-col>
          <b-col class="mb-6" cols="3" height>
          <select v-model="BatimentID" name="BatimentID" id="BatimentID" class="custom-select">
            <option value="1">Batiment principal (Staff)</option>
            <option value="2">Batiment développement</option>
          </select>
        </b-col>
      </b-row>-->

    </form>

    <!-- 
      <b-row class="text-center">

         <b-col class="mb-6" cols="6"> 
          <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">
            Bâtiment principal (Staff)
          </h1>
          <router-link to="/Selection_Bureau"><b-img   b-bind="mainProps" fluid src="../assets/bureau_1.png" alt="Image 1"></b-img></router-link>
         </b-col>
        <b-col class="mb-6" cols="6">
          <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">
           Bâtiment B (salle de pause)
          </h1>
           <b-img  usemap="#bureau_2" b-bind="mainProps" fluid src="../assets/bureau_2.png" alt="Image 2"></b-img>
        </b-col>
    </b-row>-->
  </div>
</template>

<script>
import axios from 'axios';
import { format, addDays, getDay, endOfMonth } from 'date-fns'
export default {
  data() {
    return {
      date_debut: "",
      date_fin: "",
      derniereresa: this.$store.state.RessourceID,
      BatimentID: "",
      allData: '',
       reservationId: null,
        error: null,
      dateDisabled(ymd, date) {
  // Disable weekends (Sunday = `0`, Saturday = `6`)
  // and days that are after today
  const weekday = date.getDay();
  const day = date.getDate();
  const today = new Date();
  const yesterday = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 1);
  // Return `true` if the date should be disabled
  return weekday === 0 || weekday === 6 || date < yesterday;
}
    };
  },
  methods: {
    jour: function () {
      if (this.$store.state.UtilisateurID === "") {
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');
        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else {
        console.log(this.date_debut, this.date_fin, this.BatimentID);
        this.$store.commit("changedate_debut", format(new Date(), 'yyyy-MM-dd'));
        this.$store.commit("changedate_fin", format(new Date(), 'yyyy-MM-dd'));
        this.$store.commit("changeBatimentID", this.BatimentID);
        this.$router.push("/Selection_Bureau");
      }

    },
    semaine: function () {
      if (this.$store.state.UtilisateurID === "") {
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');
        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else {
        console.log(this.date_debut, this.date_fin, this.BatimentID);
        const today = new Date();
        this.$store.commit("changedate_debut", format(new Date(), 'yyyy-MM-dd'));
        this.$store.commit("changedate_fin", format(addDays(today, 7 - getDay(today)), 'yyyy-MM-dd'));
        this.$router.push("/Selection_Bureau");
      }

    },

    resarapide: function (value) {
      if (this.$store.state.UtilisateurID === "") {
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');
        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else {
        var self = this;
        const today = new Date();
        const body ={
              UtilisateurID: this.$store.state.UtilisateurID,
              date_debut: this.$store.state.date_debut,
              email: this.$store.state.email,
              RessourceID: this.$store.state.RessourceID
        }
        if (value == 1)  body.date_fin= this.$store.state.date_fin
        if (value == 2)  body.date_fin = format(addDays(today, 7 - getDay(today)), 'yyyy-MM-dd')
        if (value == 3) body.date_fin = format(endOfMonth(today), 'yyyy-MM-dd')

        console.log(body.date_fin);
        axios
          .post("https://flex.sii-lemans.fr/api/resarapide.php", body)
          .then(function (response) {
            console.log(response.data);
            if (response.data.reservationId === "0" || parseInt(response.data.reservationId) === 0) {
              // self.$store.commit("changeerreurresa", 'Erreur lors de la réservation votre bureau est déjà réservé ou vous avez déjà une réservation durant la période');
              self.$router.push("/Reservation");
            }
            else {
              self.allData = response.data;
              //Pourquoi sa marche pas quand c'est 0?
              //  self.$store.commit("changeconfirmation", 'Votre réservation a été enregistrée');
              self.$router.push("/Reservation");
            }
          });

      }

    },
    reservation: function () {
      var self = this;
      axios
        .get("https://flex.sii-lemans.fr/api/read_resa.php?id=" + this.$store.state.UtilisateurID,)
        // axios.get('http://localhost/test/bureau.php',)
        .then(function (response) {
          console.log(response);
          self.allData = response.data;
        });
    },
    envoiedata: function () {
      //this.form comment récupérer les datas du form?
      if (this.$store.state.UtilisateurID === "") {
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');

        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else {
        console.log(this.date_debut, this.date_fin, this.BatimentID);
        this.$store.commit("changedate_debut", this.date_debut);
        this.$store.commit("changedate_fin", this.date_fin);
        this.$store.commit("changeBatimentID", this.BatimentID);
        this.$router.push("/Selection_Bureau");
      }
    }
  },
  mainProps: {
    blank: true,
    blankColor: "#777",
    width: 300,
    height: 525,
    class: "m1"
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

.ligne {
  height: 3px;
  width: 100%;
  background-color: rgb(2, 77, 151);
  padding: 5px;
}

.bouton {
  padding: 0 20px;
}
</style>