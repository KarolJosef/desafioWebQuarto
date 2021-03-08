<template>
  <div class="sideBarComponent">
    <div class="topo">
      <div class="avatar">
        <span><i class="fa fa-user"></i></span>
      </div>

      <div class="info">
        <p class="nome">Karol Jozef</p>
        <p class="status">online</p>
      </div>
    </div>

    <div class="menu">
      <ul>
        <li>
          <router-link :to="{ name: 'home' }"
            ><i class="fas fa-home"></i> Inicio</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'formnew' }"
            ><i class="fas fa-plus"></i> Novo imóvel</router-link
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SideBarComponent",
};
</script>

<style lang="scss">
.sideBarComponent {
  .topo {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px 5px;
    margin-top: 60px;
    margin-left: -7px;

    .avatar {
      margin-right: 10px;

      span {
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        color: #666666;
      }
    }
    .info {
      margin: 0;

      p {
        margin: 0;
        color: #ffff;
      }
      .nome {
        font-size: 16px;
      }

      .status {
        font-size: 12px;
      }
    }
  }
  .menu {
    margin-top: 15px;
    padding: 18px 20px;

    ul li {
      margin: 14px 0px;
      font-size: 18px;
      list-style: none;
      font-weight: 200;
      a {
        color: #ffff;
        text-decoration: none;
      }
    }
  }
}
</style>