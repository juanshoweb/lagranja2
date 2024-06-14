<template>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <video class="d-block w-100 custom-video" autoplay="autoplay" muted="muted" loop="loop">
            <source :src="video_1" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="carousel-item">
          <video class="d-block w-100 custom-video"  autoplay="autoplay" muted="muted" loop="loop">
            <source :src="video_2" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <!-- Agrega más elementos .carousel-item según sea necesario para más videos -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import video0 from '@/assets/carousel/casa1.jpg';
  import video1 from '@/assets/carousel/video1.mp4';
  import video2 from '@/assets/carousel/video2.mp4';
  
  const video_1 = ref(video1);
  const video_2 = ref(video2);
  </script>
  
  <style scoped>
    .custom-video {
        height: 95vh; /* Hace que el video ocupe toda la altura de la pantalla */
        width: 100%; /* Asegura que el video ocupe todo el ancho disponible */
        object-fit: cover; /* Asegura que el video cubra todo el área del contenedor */
    }
    .carousel-inner, .carousel-item {
        height: 100vh; /* Asegura que los elementos del carrusel también ocupen toda la altura de la pantalla */
    }
  </style>
  