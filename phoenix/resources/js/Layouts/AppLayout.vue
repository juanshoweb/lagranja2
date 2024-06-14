<template>
    <div>
      <Navbar  />  
      <Carousel />
    </div>

    <!-- Page Content -->
    <main>
        <div class="flex-grow container mx-auto py-8">
            <slot />
        </div>
    </main>


    <BackgroundVideo>
        <div class="overlay-content">
            <h1 class="video-title">Pollos a la brasa</h1>
        <p class="video-texto text-start">Tenemos el mejor pollo a la brasa de Barcelona y una amplia variedad de comida peruana; el ceviche peruano, mostrito, parrillas, aguadito, así como nuestras bebidas y postres emblema.</p>
        <p class="video-texto text-start">Ven y disfruta del rico pollo a la brasa al estilo peruano, comida tradicional de siempre.
          ¡Reserva tu mesa o solicítalo a domicilio!</p>
        </div>
    </BackgroundVideo>

    <h1 class="box-title-home mt-4" id="contacto">DONDE ESTAMOS</h1>

    <Contact />

    <GoogleMaps />

    <Footer :userInstagram="userInstagram"/>

     <!-- Botón de flecha -->
     <button class="btn btn-primary arrow-btn" v-if="showArrow" @click="scrollToTop()" aria-label="Ir arriba">
    <i class="fas fa-arrow-up"></i> <!-- Icono de flecha hacia arriba de Font Awesome -->
  </button>
  </template>
  
  <script setup>
  import { ref, onMounted, onUnmounted, defineProps} from 'vue';
  import Footer from "@/Components/Footer.vue";
  import Carousel from "@/Components/Carousel.vue";
  import Navbar from "@/Components/Navbar.vue";
  import BackgroundVideo from '@/Components/BackgroundVideo.vue';
  import GoogleMaps from '@/Components/GoogleMaps.vue';
  import Contact from '@/Pages/Contact.vue';

  const props = defineProps({
    userInstagram : String
  });

  const showArrow = ref(false);

  const handleScroll = () => {
    showArrow.value = window.scrollY > 20;
  };

  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  };

  onMounted(() => {
    window.addEventListener('scroll', handleScroll);
  });

  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
  });
  </script>
    
  <style scoped>

  .overlay-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.5); /* Ajusta el fondo del contenido para mejorar el contraste */
    padding: 20px;
    border-radius: 10px;
  }

  .video-title{
    transition-property: opacity, transform;
    font-family: "Taviraj variant0", Tofu;
    font-weight: bold;
    font-size: 100px;
  }

  .video-texto{
    transition-property: opacity, transform;
    font-family: "Taviraj variant0", Tofu;
    font-weight: bold;
    font-size: 25px;
  }

  .arrow-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
  }

  /* Estilos específicos para dispositivos móviles */
  @media only screen and (max-width: 768px) {
    .video-title{
      transition-property: opacity, transform;
      font-family: "Taviraj variant0", Tofu;
      font-weight: bold;
      font-size: 50px;
    }

    .video-texto{
      transition-property: opacity, transform;
      font-family: "Taviraj variant0", Tofu;
      font-weight: bold;
      font-size: 15px;
    }
  }
  </style>
  