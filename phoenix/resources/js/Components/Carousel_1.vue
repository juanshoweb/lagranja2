<template>
  <div class="carousel">
    <div class="slides" :style="{ transform: `translateX(${-currentIndex * 100}%)` }">
      <div v-for="(banner, index) in carouselDataProp" :key="index" class="slide">
        <img :src="banner.image" :alt="banner.alt" class="banner-image"/>
      </div>
    </div>
    <button class="btn-prev" @click="prevSlide">&#10094;</button>
    <button class="btn-next" @click="nextSlide">&#10095;</button>
  </div>
</template>

<script setup>
import { ref, onMounted} from 'vue';

const props = defineProps({
    carouselDataProp: {
      type: Array,
      required: true
    }
});

const currentIndex = ref(0);
let intervalId = null;

onMounted(() => {
  // Iniciar el carrusel automáticamente
  startCarousel();
});

function startCarousel() {
  intervalId = setInterval(nextSlide, 5000); // Cambio automático cada 5 segundos (ajustable)
}

function nextSlide() {
  currentIndex.value = (currentIndex.value + 1) % props.carouselDataProp.length;
}

function prevSlide() {
  currentIndex.value = (currentIndex.value - 1 + props.carouselDataProp.length) % props.carouselDataProp.length;
}

// Detener el cambio automático cuando el usuario interactúa con los botones
function stopCarousel() {
  clearInterval(intervalId);
}
</script>

<style scoped>
/* Estilos de tu carrusel */
.carousel {
  position: relative;
  overflow: hidden;
}

.slides {
  display: flex;
  transition: transform 0.5s ease;
}

.slide {
  min-width: 100%;
}

.banner-image {
  max-width: 100%; /* Hacer la imagen responsive */
}

.btn-prev,
.btn-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  cursor: pointer;
  padding: 10px;
  z-index: 1;
}

.btn-prev {
  left: 0;
}

.btn-next {
  right: 0;
}
</style>
