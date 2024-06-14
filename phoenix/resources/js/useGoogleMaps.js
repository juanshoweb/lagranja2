import { ref } from 'vue';
import { Loader } from '@googlemaps/js-api-loader';

export default function useGoogleMaps(apiKey) {
  const map = ref(null);

  const loader = new Loader({
    apiKey,
    version: 'weekly',
    libraries: ['places']
  });

  loader.load().then(() => {
    map.value = new google.maps.Map(document.getElementById('map'), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 8
    });
  });

  return { map };
}
