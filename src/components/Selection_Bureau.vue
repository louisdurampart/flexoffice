<template>
    <div class="Selection_Bureau">
  </div>
</template>

<script>

import { mapState, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["dateDebut", "dateFin"])
     },
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>