<template>
  
    <div class="Creation">

      <b-row align-h="center">
      
      
        <b-col cols="4" > 
          <h1 class="display-2 font-weight-bold mb-3" dark color="indigo darken-3">
           Création de compte
          </h1>
        </b-col>
      </b-row>
      <b-row align-h="center">
        <b-col cols="4" > <b-card  outlined shaped >
      <b-container class="bv-example-row">
        <Form inline>
              
              <input id="inputIdentifiant" name="nom" elevation="4" type="text" placeholder="Identifiant SII"/>
          
              <input id="inputMdp" name="mdp" type="password" elevation="2" placeholder="Votre mot de passe"/>
           
          </Form>
      </b-container>   
       
         
         <router-link to="/Creation"><a class="pa-2"> créez un compte</a></router-link>
       
    </b-card>
      </b-col>
    </b-row>
    
    </div>
</template>


<script>
  export default {
    data() {
      return {
        mainProps: { blank: true, blankColor: '#777', width: 300, height: 525, class: 'm1' },
        
        dateDisabled(ymd, date) {
        // Disable weekends (Sunday = `0`, Saturday = `6`) and
        // disable days that fall on the 13th of the month
        const weekday = date.getDay()
        const day = date.getDate()
        // Return `true` if the date should be disabled
        return weekday === 0 || weekday === 6 || day === 13
      }
      }
    }
  }
</script>