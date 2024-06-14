<script setup>
import App from '@/Layouts/App.vue';
import Welcome from '@/Components/Welcome.vue';

import { defineProps, ref } from 'vue'

// Définir les props
/* const props = defineProps({
  message: {
    type: String,
    required: true
  },
  count: {
    type: Number,
    required: false,
    default: 0
  }
}) */


// Définir les props
const props = defineProps({
    photos: {
    type: Array,
    required: true
  }
  
})

const media = ref([]); // Import 'ref' from 'vue' if not already done

// Assuming $media['data'] is already defined elsewhere and assigned to the 'media' variable

</script>

<template>
    <App title="Galeria">

        <!-- Contenido principal -->
        <main class="container mt-4">
            <div class="container">
                <div class="row">
                    <div v-for="post in props.photos.data" :key="post.id" class="col-md-3 mb-4">
                        <div class="card">
                        <template v-if="post.media_type === 'IMAGE' || post.media_type === 'CAROUSEL_ALBUM'">
                            <img :src="post.media_url" :alt="post.caption" class="card-img-top">
                        </template>
                        <template v-else-if="post.media_type === 'VIDEO'">
                            <video class="card-img-top" controls>
                            <source :src="post.media_url" type="video/mp4">
                            Your browser does not support the video tag.
                            </video>
                        </template>
                        <div class="card-body">
                            <p class="card-text">{{ post.caption }}</p>
                            <a :href="post.permalink" target="_blank" class="btn btn-primary" rel="noopener">View on Instagram</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </App>
</template>


<style scoped>
.card-img-top {
  width: 100%;
  height: auto;
}
</style>

