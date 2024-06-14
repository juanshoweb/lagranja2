<template>
  <div>
   

    <!-- Modal -->

    <div class="modal fade" :id="'exampleModal_' + modalId " tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" ref="modalRef">
      <!-- Contenido del modal -->
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Carrusel de Imágenes</h5>
            <button type="button" class="btn-close" @click="closeModal"></button>
          </div>
          <div class="modal-body">
            
            <!-- Carrusel aquí -->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                
                <div v-for="(image, index) in imagesCarousel" :key="index" :class="{ 'carousel-item': true, 'active': index === currentIndex }">
                  <template v-if="image.media_type === 'image'">
                    <img :src="image.url" :alt="image.alt" class="d-block w-100"  style="max-height: calc(100vh - 200px);" />
                  </template>
                  <template v-else-if="image.media_type === 'video'">
                    <video class="card-img-top" autoplay muted>
                      <source :src="image.url" type="video/mp4">
                      Your browser does not support the video tag.
                      </video>
                  </template>
                </div>              
          
              </div>
              <button class="carousel-control-prev" type="button" @click="prevSlide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>
              <button class="carousel-control-next" type="button" @click="nextSlide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, defineProps, defineEmits, watch, onMounted} from 'vue';

//const props = defineProps(['openModal']);

const props = defineProps({
  imagesCarousel : Array,
  modalId: String,
  carouselControls: Object,
});

const emit = defineEmits(["indexChanged", "openModal"]);
const currentIndex = ref(0);
const modal = ref(null);
const modalRef = ref(null);
let modalInstance = null;


onMounted(() => {
  modalInstance = new bootstrap.Modal(modalRef.value); // Crear la instancia del modal
});

const openModal = () => {
  // Abrir el modal
  const modalInstance = new bootstrap.Modal(modal.value);
  modalInstance.show();
};

// Método para cerrar el modal
/* const closeModal = () => {
  const modalInstance = new bootstrap.Modal(modal.value);
  modalInstance.hide();
}; */

const closeModal = () => {
  if (modalInstance) {
    modalInstance.hide(); // Cierra el modal
  }
};


// Escuchar evento personalizado para abrir el modal con las imágenes
const handleOpenModal = (imagesData) => {
  // Mostrar modal y pasar imágenes
  //images.value = imagesData;
  openModal();
};



const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % props.imagesCarousel.length;
};

const prevSlide = () => {
  currentIndex.value = (currentIndex.value - 1 + props.imagesCarousel.length) % props.imagesCarousel.length;
};
</script>




<style scoped>
/* Estilos opcionales para personalizar el modal */
</style>
