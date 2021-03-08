<template>
  <div>
    <DashboardComponent>
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <h3 class="h3">Ultimos imóveis cadastrados:</h3>
        </header>

        <div class="row">
          <div class="col-12 col-md3">
            <CardsComponent :icon="'fa-map-marker'" :anuncio="anuncios.data" />
          </div>
        </div>
      </div>
    </DashboardComponent>
  </div>
</template>

<script>
import Vue from "vue";
import DashboardComponent from "../../components/Dashboard/DashboardComponent";
import CardsComponent from "../../components/CardsComponent";
import VueAxios from "vue-axios";
const axios = require("axios");

export default {
  name: "HomeComponent",
  data() {
    return {
      anuncios: [],
    };
  },

  mounted() {
    this.getAnuncios();
  },

  methods: {
    async getAnuncios() {
      Vue.use(VueAxios, axios);
      const response = await this.axios.get("/anuncio");
      if (response.status == 200) {
        this.anuncios = response.data;
      } else {
        console.error("ocorreu um erro");
      }
    },
  },
  components: {
    DashboardComponent,
    CardsComponent,
  },
};
</script>


