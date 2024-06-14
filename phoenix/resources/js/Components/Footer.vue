<script setup>
  import { defineProps} from 'vue';

    const props = defineProps({
        userInstagram : String
    });

</script>

<template>

    <footer class="text-center bg-footer">
        <div class="container">
            <div class="mb-4">
                <div class="navbar-title">La Granja 2</div>
                <div class="navbar-slogan">Bar - Restaurante</div>
            </div>
            <div class="social-icons">
                <!-- Iconos de redes sociales -->
                <a href="https://www.facebook.com/profile.php?id=61552742158956" target="_blank"><i class="fab fa-facebook"></i></a>
                <a :href="`https://www.instagram.com/${userInstagram}`" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <!-- Enlaces a textos legales -->
            <div class="legal-links mt-3">
                <a href="#">Términos y Condiciones</a> |
                <a href="#">Política de Privacidad</a>
            </div>
            <!-- Copyright -->
            <div class="mt-3">
                <p>&copy; 2024 La Granja 2. Todos los derechos reservados.</p>
            </div>
            <div class="mt-3"> 
                <p>Diseñado por: <a href="https://www.instagram.com/ilusiones.laia" target="_blank">Ilusiones Laia</a></p>
            </div>
        </div>
    </footer>

</template>


<style scoped>
    /* Estilo personalizado para el footer */
    footer {
        background-color: #ff4444; /* Color de fondo */
        color: #fff; /* Color del texto */
        padding: 20px 0; /* Espaciado interno superior e inferior */
    }
    .social-icons {
        display: flex; /* Mostrar los íconos de redes sociales en línea */
        justify-content: center; /* Centrar los íconos de redes sociales */
    }
    .social-icons a {
        color: #fff; /* Color de los íconos de redes sociales */
        margin: 0 15px; /* Espaciado entre los íconos de redes sociales */
        font-size: 24px; /* Tamaño de los íconos */
    }
    .legal-links a {
        color: #fff; /* Color de los enlaces a textos legales */
    }
</style>
