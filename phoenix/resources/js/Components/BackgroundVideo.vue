<template>
    <div class="video-background">
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" id="bg-video">
        <source :src="video" type="video/mp4">
      </video>
      <div class="content">
        <slot></slot>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import { ref } from 'vue';
  import videoBackground from '@/assets/videos/pollos1.mp4'; // Asegúrate de tener un logo en la carpeta assets

  const video = ref(videoBackground);
  </script>
  
<style scoped>

.video-background {
  position: relative;
  height: 100vh;
  width: 100%;
  overflow: hidden;
}

#bg-video {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: translate(-50%, -50%);
  z-index: -1;
}

.content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
  color: white;
  text-align: center;
}
</style>