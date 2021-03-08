<template>
  <div v-if="anuncio != null">
    <div v-for="item of anuncio" :key="item.id">
      <div class="card" style="width: 18rem">
        <img
          class="card-img-top"
          src="../assets/scss/img1.jpg"
          alt="Card image cap"
        />

        <div class="card-body">
          <h5 class="card-title">{{ item.titulo }}</h5>
          <p class="preco">Preço:{{ item.valor }} R$</p>
          <div class="icone">
            <i :class="['fas', icon]"></i>
          </div>
          <p class="endereco">
            {{ item.bairro }}{{ item.cidade }}-{{ item.estado }}
          </p>
          <router-link :to="{ name: 'detalhes' }">
            <li class="btn btn-primary">Ver detalhes</li>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardsComponent",
  props: {
    icon: String,
    anuncio: Array,
  },
};
</script>

<style lang="scss" scoped>
.icone {
  float: left;
}
.endereco {
  margin-left: 20px;
}
.preco {
  justify-self: center;
}
.card {
  margin-left: 50px;
  margin-right: 30px;
  float: left;

  margin-bottom: 35px;
}
</style>