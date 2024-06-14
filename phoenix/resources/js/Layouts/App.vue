<template>
    <div>
      <Navbar  />  
    </div>

    <!-- Page Content -->
    <main>
        <div class="flex-grow container mx-auto py-8">
            <slot />
        </div>
    </main>

    <Footer />
  </template>
  
  <script setup>
  import { onMounted } from 'vue';
  import Footer from "@/Components/Footer.vue";
  import Navbar from "@/Components/Navbar.vue";
  
  // Aquí puedes agregar cualquier lógica que necesites para el componente
  onMounted(() => {
    // Código para ejecutar después de que el componente se monte
  });
  </script>
  
  <style>
  /* Puedes agregar estilos personalizados aquí si es necesario */
  </style>
  