<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
    <div class="container-fluid">
      <div class="navbar-logo-container">
        <!-- <img :src="logo" alt="Logo" class="navbar-logo" /> -->
        <div class="navbar-title">La Granja 2</div>
        <div class="navbar-slogan">Bar - Restaurante</div>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#carta">Carta</a>
            </li>
 
            <li class="nav-item">
              <a class="nav-link" href="#promociones" >Promociones</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#eventos">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contacto">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';
import logoImage from '@/assets/logo.png'; // Asegúrate de tener un logo en la carpeta assets

const logo = ref(logoImage);
const isSidebarOpen = ref(false);

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};
</script>

<style scoped>
.navbar-logo-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.navbar-logo {
  height: 70px; /* Ajusta el tamaño del logo */
}

.navbar-slogan {
  color: white; /* Ajusta el color del eslogan según tus necesidades */
  font-size: 14px; /* Ajusta el tamaño de la fuente según tus necesidades */
  margin-top: 5px; /* Espacio entre el logo y el eslogan */
  transition-property: opacity, transform;
  font-family: "Pacifico variant0", Tofu;

}



</style>
