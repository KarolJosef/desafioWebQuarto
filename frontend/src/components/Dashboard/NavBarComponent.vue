<template>
<div class="row">
    <div class="col-12 col-md3">
         <h3 class="logo"><i class="fas fa-star"></i></h3>       
         <h3 class="logo"><i class="fas fa-home"></i> Sysmoveis </h3>   
         
      
         
    </div>
    <div class="col-12 col-md3">         
         <a href="" @click.prevent="logout" class="logout">Sair <i class="fas fa-sign-out-alt"></i></a>
      
         
    </div>
</div>
    
</template>

<script>


export default {
    name: 'NavBarComponent',
    methods:{
        logout(){
            this.$router.push({name:'login'});
        }
    }   
}

</script>

<style lang="scss">

 .navbar {  

    .logo {
     color: #FFFF;
     height: 20px;
     position: relative;
     top: 5px; 
  }
    .logout {
      color: #fff;
      text-decoration: none;
      position: relative;
      
      left:  1070px;
      bottom: 38px;  
   }
  
  
 }       
</style>