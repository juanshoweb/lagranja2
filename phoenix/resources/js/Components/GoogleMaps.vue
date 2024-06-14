<template>
  <div>
    <div ref="mapContainer" style="height: 600px;" class="mt-4"></div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Loader } from '@googlemaps/js-api-loader';

const mapContainer = ref(null);

onMounted(() => {
  const loader = new Loader({
    apiKey: 'AIzaSyCqqlsf8b4XOrhqn6AmY16d6LxGju8Ww4Q',
    version: 'weekly',
  });

  loader.load().then(() => {
    const map = new google.maps.Map(mapContainer.value, {
      center: { lat: 41.3782844543457, lng: 2.1251893043518066 },
      zoom: 15,
    });

    const geocoder = new google.maps.Geocoder();
    const address = 'Carrer de Benavent, 16, barcelona';

    geocoder.geocode({ address: address }, (results, status) => {
      if (status === 'OK') {
        map.setCenter(results[0].geometry.location);
        new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
        });
      } else {
        console.error('Geocode was not successful for the following reason: ' + status);
      }
    });
  });
});
</script>
