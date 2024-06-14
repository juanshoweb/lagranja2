<template>
  <div class="row">
    <div v-for="(item, index) in items" :key="index" class="col-md-3 mb-4">
      <div class="card text-center">
        <img :src="item.imageSrc" class="card-img-top" alt="Card image" style="width: 300px;height: 400px;">
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
          <p class="card-text text-white title-card">{{ item.text }}</p>
         
          
            <button class="btn btn-primary" :data-bs-toggle="'modal'" :data-bs-target="'#exampleModal_' + index" @click="loadImages(index)">
            <span >más</span> 

          </button>


          <carouselModal :imagesCarousel="images"  :modalId="index" :carouselControls="carouselControls" @indexChanged="handleIndexChanged"/>
        </div>
      </div>
    </div>
  
  
  </div>
</template>

<script setup>
import { ref, defineEmits} from 'vue';
import axios from 'axios'
import CarouselModal from '@/Components/CarouselModal.vue';

// Importa tus imágenes y datos JSON
import pollos_home from '@/assets/home/pollos/pollosHome.jpeg';
import carnes_home from '@/assets/home/carnes/carnesHome.avif';
import gastronomia_home from '@/assets/home/gastronomia/gastronomiaHome.jpeg'
import vinos_home from '@/assets/home/vinos/vinosHome.jpg'

const jsonImagenes = [
  {
    "container": {
      "images": [
        { "src": "/images/home/pollos/pollos1.jpeg", "alt": "Imagen 1" },
        { "src": "/images/home/pollos/pollos2.jpeg", "alt": "Imagen 2" },
        { "src": "/images/home/pollos/pollos3.jpeg", "alt": "Imagen 3" }
      ],
      "additional_info": {
        "title": "La granja 2 - Pollos a la Brasa",
        "description": "Aquí puedes agregar información adicional sobre las imágenes"
      }
    }
  },
  // Agrega más objetos según sea necesario
];

const pollosHome = ref(pollos_home);
const items = ref([
  { imageSrc: pollosHome, text: 'Pollos a la Brasa' },
  { imageSrc: carnes_home, text: 'Carnes a la Parrilla' },
  { imageSrc: gastronomia_home, text: 'Gastronomía Peruana y Española' },
  { imageSrc: vinos_home, text: 'Lo mejor en Vinos y Cavas' }
]);

const carouselControls = {
  prevIcon: '<', // Personalizar icono de anterior
  nextIcon: '>', // Personalizar icono de siguiente
};

const images = ref([]);

/*
const images = [

        { "url": "/images/home/pollos/pollos1.jpeg", "alt": "Imagen 1" },
        { "url": "/images/home/pollos/pollos2.jpeg", "alt": "Imagen 2" },
        { "url": "/images/home/pollos/pollos3.jpeg", "alt": "Imagen 3" }
      
]; */



const emit = defineEmits(["openModal"]);


const currentIndex = ref(0);

const handleIndexChanged = (index) => {
  currentIndex.value = index;
};


const loadImages = (index) => {

    images.value = []; // eliminamos de peticiones anteriores
      // Realizar petición para obtener las imágenes
    axios.get('themostrequested', {
      params: {
        // Aquí añades los parámetros que necesites
        type: index
      }
    })
    .then(response => {
      // Emitir evento para abrir el modal con las imágenes
      emit('openModal', { images: response.data });
      images.value = response.data;
    })
    .catch(error => {
      console.error('Error al cargar las imágenes:', error);
    });
};
</script>

<style scoped>
/* Estilos aquí */
</style>
