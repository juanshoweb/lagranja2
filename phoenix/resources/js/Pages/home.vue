<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import BoxHome from '@/Components/BoxHome.vue';
import InstagramPhotos from '@/Components/InstagramPhotos.vue';
import Carousel_1 from '@/Components/Carousel_1.vue';
import LightboxComponent from '@/Components/LightboxComponent.vue';
import { ref, defineProps } from 'vue';

// Definir las propiedades esperadas en el componente
const props = defineProps({
    photosInstagram: {
        type: Array,
        default: () => []
    },
    videosInstagram: {
        type: Array,
        default: () => []
    },
    userInstagram: String,
    carouselData: Array
});


</script>

<template>
    <AppLayout title="Dashboard" :userInstagram="userInstagram">

        <!-- Contenido principal -->
        <div class="container mt-4">

            <h1 class="box-title-home">LO MÁS PEDIDO DE LA CARTA</h1>

            <BoxHome />

            <h1 class="box-title-home" id="promociones">PROMOCIONES</h1>

            <Carousel_1  :carouselDataProp="carouselData"/> 


            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="https://www.instagram.com/juanshoweb" target="_blank">
                        <img src="https://img.freepik.com/vector-premium/boton-aplicacion-redes-sociales-logotipo-instagram-gradiente_197792-9450.jpg?w=826" alt="Instagram" style="max-width: 100px; transition: opacity 0.3s ease;">
                        </a>
                    </div>
                    <div class="col">
                        <h1 class="box-title-home text-center" id="carta">LA GRANJA 2</h1>
                    </div>
                </div>
            </div>
            <InstagramPhotos 
                :photosInstagram="photosInstagram"
                :userInstagram="userInstagram"
            />

            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="https://www.instagram.com/juanshoweb" target="_blank">
                        <img src="https://img.freepik.com/vector-premium/boton-aplicacion-redes-sociales-logotipo-instagram-gradiente_197792-9450.jpg?w=826" alt="Instagram" style="max-width: 100px; transition: opacity 0.3s ease;">
                        </a>
                    </div>
                    <div class="col">
                        <h1 class="box-title-home text-center" id="eventos">EVENTOS - LA GRANJA 2</h1>
                    </div>
                </div>
            </div>
        </div>
        

        <InstagramPhotos 
                :photosInstagram="videosInstagram"
                :userInstagram="userInstagram"
            />

    </AppLayout>
</template>


<style>
 /* Estilo personalizado para centrar la imagen horizontalmente y aplicar un efecto de fade */

</style>