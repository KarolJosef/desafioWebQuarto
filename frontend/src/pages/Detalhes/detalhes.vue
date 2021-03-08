<template>
  <DashboardComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>Detalhes</p>
      </header>
    </div>

    <div>
      <router-view></router-view>
    </div>
  </DashboardComponent>
</template>
<script>
import DashboardComponent from "../../components/Dashboard/DashboardComponent";

export default {
  name: "detalhes",

  components: {
    DashboardComponent,
  },
};
</script>
<style scoped>
</style>