<template>
    <div class="container">
        <div class="row">

            <div v-for="post in photos" :key="post.id" class="col-md-3 mb-4">
                <div class="card" style="padding: 10px;background-color: #cf2e2e !important;">
                    <a :href="post.permalink" target="_blank" rel="noopener">
                    <template v-if="post.media_type === 'IMAGE' || post.media_type === 'CAROUSEL_ALBUM'">
                        <img :src="post.media_url" :alt="post.caption" class="card-img-top">
                    </template>
                    <template v-else-if="post.media_type === 'VIDEO'">
                        <video class="card-img-top" controls muted controlsList="nodownload">
                            <source :src="post.media_url" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </template>
                    <!-- <div class="card-body">
                        <p class="card-text">{{ post.caption }}</p>
                        <a :href="post.permalink" target="_blank" class="btn btn-primary" rel="noopener">View on Instagram</a>
                    </div> -->
                    </a>
                </div> 
            </div>
        </div>

        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-6 text-center">
                <button type="button" class="btn btn-primary btn-lg mr-2"  v-if="hasNextPage !== null && hasNextPage" @click="loadMore">
                    <i class="fas fa-plus-circle mr-1"></i> Cargar más
                </button>
            </div>
            <div class="col-md-6 text-center">
                <a type="button" class="btn btn-secondary btn-lg" target="_blank" :href="`https://www.instagram.com/${userInstagram}`">
                    <i class="fab fa-instagram mr-1"></i> Síguenos en Instagram
                </a>
            </div>
        </div>

    </div>        
</template>

<script setup>

// Define el prop 'photos'
import { ref, defineProps, computed } from 'vue';
import axios from 'axios';

const props = defineProps({
    photosInstagram: Array,// Define el tipo de 'photos' como un array
    userInstagram: String
});

// Variable reactiva para almacenar las publicaciones
//const posts = ref([]);

// Variable reactiva para almacenar si se han cargado resultados previamente
const isFirstLoad = ref(true);

// Variable reactiva para almacenar el punto de inicio de la paginación
let after = null;

// Variable reactiva para almacenar si hay más páginas disponibles
let hasNextPage = ref(true);

const photos = ref(props.photosInstagram); // Crear una referencia reactiva local

// Método para cargar más publicaciones
const loadMore = async () => {
  try {
    // Hacer la solicitud a Laravel para obtener más publicaciones
    const response = await axios.get('/instagram', {
      params: { after }
    });

    // Obtener los datos de la respuesta JSON
    const newData = response.data;

    // Actualizar el punto de inicio de la paginación
    after = newData.paging.cursors.after;

    // Agregar las nuevas publicaciones a la lista existente
    // Si es la primera carga, reemplazar los resultados existentes
    if (isFirstLoad.value) {
        photos.value = newData.data;
        isFirstLoad.value = false;
    } else {
        // Agregar las nuevas publicaciones a la lista existente
        photos.value = [...photos.value, ...newData.data];
    }

    // Actualizar si hay más páginas disponibles
    hasNextPage.value = !!after;

  } catch (error) {
        console.error('Error al cargar más publicaciones:', error);
  }
};

</script>

<style scoped>

</style>

