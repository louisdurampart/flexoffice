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
</map> -->

      <b-row class="text-center">
        <b-col class="mb-6" cols="12">
          <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">
            Le Mans Flex Office
          </h1>
        </b-col>
      </b-row>

       <form v-on:submit.prevent="envoiedata" >
  <b-row class="row justify-content-md-center">
  
    <b-col class="text-center" md="3">
      <p>Date de début :</p>
      <b-calendar v-model="date_debut" :date-disabled-fn="dateDisabled"
       locale="fr" label-help="Utilisez le curseur pour sélectionner la date"  
       :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
       class="border rounded p-2" >
       </b-calendar>
    </b-col>
    <b-col class="text-center" md="3">
      <p>Date de fin :</p>
      <b-calendar v-model="date_fin" :date-disabled-fn="dateDisabled"
       locale="fr" label-help="Utilisez le curseur pour sélectionner la date"
       :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
       class="border rounded p-2"></b-calendar>
    </b-col>
  </b-row>
  <b-row class="text-center">
      <b-col class="mb-6" cols="12">
        <label for="BatimentID">Choisissez le batiment :</label>
<select name="BatimentID" id="BatimentID">
    <option value="1">Batiment principal (Staff)</option>
    <option value="2">Batiment développement</option>
</select>
      </b-col>
  </b-row>
  <b-row class="text-center">
    <b-col class="mb-6" cols="12">
      <v-btn  color="accent" elevation="4" outlined rounded type="submit">Je valide</v-btn>
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
      </b-row> -->



    </div>
    
</template>

<script>

  export default {
    data() {
      return {  
        allData:'', 
        date_debut:'',
        date_fin:'', 
        BureauID:'', 
        dateDisabled(ymd, date) {
        // Disable weekends (Sunday = `0`, Saturday = `6`) and
        // disable days that fall on the 13th of the month
        const weekday = date.getDay()
        const day = date.getDate()
        // Return `true` if the date should be disabled
        return weekday === 0 || weekday === 6 || day === 13
      }
      }
      
    },
    methods: {
    envoiedata:function(){
      this.$router.push('/Selection_Bureau')
   },
  },
mainProps: { blank: true, blankColor: '#777', width: 300, height: 525, class: 'm1' },
  }
</script>