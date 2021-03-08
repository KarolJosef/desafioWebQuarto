<template>
  <DashboardComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>Cadastrar Novo Anuncio</p>
      </header>

      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Título</label>
            <input
              type="Text"
              class="form-control"
              id="titulo"
              placeholder="Título"
              ref="titulo"
              v-model="titulo"
            />
            <label>Descrição</label>
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
              v-model="descricao"
            ></textarea>
          </div>

          <div class="form-group col-md-6">
            <label>Preço</label>
            <input
              class="form-control"
              id="inputPreco"
              placeholder="Preço"
              v-model="valor"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Logradouro</label>
            <input
              type="text"
              class="form-control"
              id="inputLogradouro"
              placeholder="Rua: da revolução"
              v-model="logradouro"
            />
          </div>
          <div class="form-group col-md-6">
            <label>Bairro</label>
            <input
              type="text"
              class="form-control"
              id="inputBairro"
              placeholder="Bairro Lapa"
              v-model="bairro"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input
              type="text"
              class="form-control"
              id="inputCity"
              v-model="cidade"
            />
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Estado</label>
            <select id="estado" class="form-control" v-model="estado">
              <option selected>Escolha o estado</option>
              <option>AC</option>
              <option>AM</option>
              <option>AP</option>
              <option>AL</option>
              <option>BA</option>
              <option>CE</option>
              <option>DF</option>
              <option>ES</option>
              <option>GO</option>
              <option>MA</option>
              <option>MT</option>
              <option>MS</option>
              <option>MG</option>
              <option>PA</option>
              <option>PB</option>
              <option>PI</option>
              <option>PR</option>
              <option>PE</option>
              <option>RJ</option>
              <option>RN</option>
              <option>RS</option>
              <option>RO</option>
              <option>RR</option>
              <option>SC</option>
              <option>SP</option>
              <option>SE</option>
              <option>TO</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Cep</label>
            <input type="text" class="form-control" id="cep" v-model="cep" />
          </div>
        </div>

        <div id="app">
          <div>
            <h2>Selcione as imagem</h2>
            <input type="file" @change="onFileSelected" />
          </div>
        </div>
        <br />

        <button type="submit" @click="postAnuncios" class="btn btn-primary">
          Cadastrar
        </button>
      </form>
    </div>
  </DashboardComponent>
</template>

<script>
import DashboardComponent from "../../components/Dashboard/DashboardComponent";
import Vue from "vue";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
const axios = require("axios");
const router = new VueRouter();
export default {
  name: "FormNew",

  data() {
    return {
      foto: null,
      titulo: "",
      descricao: "",
      valor: "",
      cep: "",
      cidade: "",
      estado: "",
      bairro: "",
      logradouro: "",
      numero: "89",
      //   latitude: "12.123456",
      // longitude: "123.123456",
    };
  },

  components: {
    DashboardComponent,
  },

  methods: {
    async postAnuncios() {
      Vue.use(VueAxios, axios);
      Vue.use(VueRouter, router);
      let formData = new FormData();

      var date = {
        titulo: this.titulo,
        descricao: this.descricao,
        valor: this.valor,
        cep: this.cep,
        cidade: this.cidade,
        estado: this.estado,
        bairro: this.bairro,
        logradouro: this.logradouro,
        numero: this.numero,
        // latitude: this.latitude,
        //longitude: this.longitude,
      };
      formData.append("foto", this.foto),
        formData.append("titulo", this.titulo),
        formData.append("descricao", this.descricao),
        formData.append("valor", this.valor),
        formData.append("cep", this.cep),
        formData.append("cidade", this.cidade),
        formData.append("estado", this.estado),
        formData.append("bairro", this.bairro),
        formData.append("logradouro", this.logradouro),
        formData.append("numero", this.numero),
        // formData.append("longitude", this.longitude),
        //formData.append("latidude", this.latitude),
        await this.axios
          .post("/anuncio", formData, date, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })

          .then(function () {
            console.log("Sucesso");
          })
          .catch(function () {
            console.log("FAILTURE");
          })
           this.$router.push('home');
     
    },

    onFileSelected(event) {
      this.foto = event.target.files[0];
      console.log(this.foto);
    },
  },
};
</script>

<style lang="scss" src="./style.scss" scoped >
