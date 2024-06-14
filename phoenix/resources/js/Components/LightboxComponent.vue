<template>
    <div>
      <button @click="openLightbox">Open Lightbox</button>
      <vue-image-lightbox v-if="isOpen" :images="images" @close="closeLightbox" />
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import VueImageLightbox from 'vue-image-lightbox';
  
  const isOpen = ref(false);
  const images = ref([]);
  
  const openLightbox = (imageData) => {
    images.value = imageData;
    isOpen.value = true;
  };
  
  const closeLightbox = () => {
    isOpen.value = false;
  };
  </script>
  