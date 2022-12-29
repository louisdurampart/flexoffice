// store/index.js
 
import Vue from "vue";
import Vuex from "vuex";
 
Vue.use(Vuex);
 
export default new Vuex.Store({
 state: { 
    user: {
    email: 'matt',
    fullName: 'Matt Maribojoc',
   
  },
  reservation: {
    date_debut: Date.now(),
    date_fin: Date.now(),
    BatimentID: '1',
  },
},
 getters: { 
  prenom: state => {
    return state.user.fullName.split(' ')[0]
  },
  email : state => {
    return state.user.email.split(' ')[0]
  },
  date_debut: state => {
    return state.reservation.date_debut.split(' ')[0]
  },
  date_fin: state => {
    return state.reservation.date_fin.split(' ')[0]
  },
  BatimentID: state => {
    return state.reservation.BatimentID.split(' ')[0]
  },
},

 mutations: {
  changeemail (state, payload) {
    state.user.email = payload
  },
    changedate_debut (state, payload) {
      state.reservation.date_debut = payload
    },
    changedate_fin (state, payload) {
      state.reservation.date_fin = payload
    },
    changeBatimentID (state, payload) {
      state.reservation.BatimentID = payload
    }
 },
 actions: {}
});