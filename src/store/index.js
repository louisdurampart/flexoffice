// store/index.js
 
import Vue from "vue";
import Vuex from "vuex";
 import moment from "moment/moment";
 import { format, formatDistance, formatRelative, subDays } from 'date-fns'

Vue.use(Vuex);
 
export default new Vuex.Store({
   
 state: { 
  UtilisateurID: '',
    email: '',
    nom: '',
    prenom: '',
    date_debut:  format(new Date(), 'yyyy-dd-MM'), //moment().format('MMMM Do YYYY') ,
    date_fin: format(new Date(), 'yyyy-dd-MM'),
    BatimentID: '1',
    BureauID:'1',
    RessourceID:'1',
    erreur:'',
    confirmation:''
   
},
 getters: { 
  
  UtilisateurID: (state) => state.UtilisateurID,
    email: (state) => state.email,
    nom: (state) => state.nom,
    prenom: (state) => state.prenom,
    dateDebut: (state) => state.date_debut,
    dateFin: (state) => state.date_fin,
    batimentId: (state) => state.BatimentID,
    bureauId: (state) => state.BureauID,
    ressourceId: (state) => state.RessourceID,
    erreur: (state) => state.erreur,
    confirmation: (state) => state.confirmation,

    formattedDateDebut: (state) => {
      const date = new Date(state.date_debut)
      return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`
    }

},

 mutations: {
  changeutilisateurID (state, payload) {
    state.UtilisateurID = payload
  },
  changeemail (state, payload) {
    state.email = payload
  },
  changenom (state, payload) {
    state.nom = payload
  },
  changeprenom (state, payload) {
    state.prenom = payload
  },
    changedate_debut (state, payload) {
      state.date_debut = payload
    },
    changedate_fin (state, payload) {
      state.date_fin = payload
    },
    changeBatimentID (state, payload) {
      state.BatimentID = payload
    },
    changeBureauID (state, payload) {
      state.BureauID = payload
    },
    changeRessourceID (state, payload) {
      state.ressourceId = payload
    },
    changeerreur (state, payload) {
      state.erreur = payload
    },
    changeconfirmation (state, payload) {
      state.confirmation = payload
    },
 },
 actions: {}
});