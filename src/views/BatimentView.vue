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

    <b-row class="text-center">
      <b-col class="mb-6" cols="12">
        <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">Le Mans Flex Office</h1>
      </b-col>
    </b-row>

    <form v-on:submit.prevent="envoiedata">
      <b-row class="row justify-content-md-center">
        <b-col class="text-center" md="3">
          <label for="date_debut">Date de début :</label>
          <div>
            <b-form-datepicker
              v-model="date_debut"
              :date-disabled-fn="dateDisabled"
              locale="fr"
              placeholder="Choisissez une date"
              id="date_debut"
              today-button
              reset-button
              close-button
            ></b-form-datepicker>
          </div>
        </b-col>
        <b-col class="text-center" md="3">
          <label for="date_fin">Date de fin :</label>
          <div>
            <b-form-datepicker
              v-model="date_fin"
              :date-disabled-fn="dateDisabled"
              locale="fr"
              placeholder="Choisissez une date"
              id="date_fin"
              today-button
              reset-button
              close-button
            ></b-form-datepicker>
          </div>
        </b-col>
      </b-row>

      <div class="mb-6"></div>
      <b-row class="text-center">
        <b-col class="mb-6" cols="12">
        <v-btn color="primary" elevation="4" outlined rounded @click="envoiedata()">Réserver aujourd'hui</v-btn>
        <v-btn color="primary" elevation="4" outlined rounded type="submit">Réserver la semaine</v-btn>
      </b-col>
        </b-row>
      <b-row class="ligne"></b-row>
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
      <b-row class="text-center">
        <!-- v-if="this.date_debut !== ''" -->
        <b-col class="mb-6" cols="12" v-if="this.date_debut !== '' && this.date_fin >= this.date_debut && this.date_fin !== ''" >
          <v-btn color="primary" elevation="4" outlined rounded type="submit">Je valide</v-btn>
        </b-col>
      </b-row>
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

import { format, formatDistance, formatRelative, subDays } from 'date-fns'
export default {
  data() {
    return {
      date_debut: format(new Date(), 'yyyy-dd-MM'),
      date_fin: format(new Date(), 'yyyy-dd-MM'),
      BatimentID: "",
      dateDisabled(ymd, date) {
        // Disable weekends (Sunday = `0`, Saturday = `6`) and
        // disable days that fall on the 13th of the month
        const weekday = date.getDay();
        const day = date.getDate();
        // Return `true` if the date should be disabled
        return weekday === 0 || weekday === 6;
      }
    };
  },
  methods: {
    jour:function(){
      if(this.$store.state.UtilisateurID === ""){
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');
        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else{
      console.log(this.date_debut, this.date_fin, this.BatimentID);
      this.$store.commit("changedate_debut", date_debut); 
      this.$store.commit("changedate_fin", date_fin); 
      this.$store.commit("changeBatimentID", this.BatimentID);
      this.$router.push("/Selection_Bureau");
    }

    },
    envoiedata: function() {
      //this.form comment récupérer les datas du form?
      if(this.$store.state.UtilisateurID === ""){
        this.$store.commit("changeerreur", 'Erreur lors de la sélection de date, vous n\'êtes pas connecté !');
        console.log(this.$store.state.erreur);
        this.$router.push("/");
      }
      else{
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
  height: 5px;
  width: 100%;
  background-color: rgb(2, 77, 151);
  padding: 5px;
}
</style>