<template>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 text-center">
          <div class="d-flex flex-column align-items-center">
            <i class="fas fa-envelope fa-5x mb-3" style="color: #0d6efd;"></i>
            <h5 class="contact-title">Contacto</h5>
            <p>Correo electrónico: ejemplo@correo.com</p>
            <p>Teléfono: 123456789</p>
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <i class="fas fa-map-marker-alt fa-5x mb-3" style="color: #0d6efd;"></i>
          <h5 class="contact-title">Ubicación</h5>
          <p>Dirección: Carrer de Benavent, 16, </p>
          <p>Les Corts, 08028 Barcelona</p>
        </div>
        <div class="col-lg-4 text-center">
          <a href="https://www.instagram.com/tu_instagram" target="_blank">
            <i class="fab fa-instagram fa-5x mb-3"></i>
          </a>
          <h5 class="contact-title">Instagram</h5>
          <p>Síguenos en Instagram</p>
          <p>@lagraja2bcn</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import '@fortawesome/fontawesome-free/css/all.css'; // Importa todos los estilos de FontAwesome
  </script>
  
  <style>
  /* Estilos adicionales si es necesario */
  .footer {
      background-color: #333;
      color: white;
      padding: 20px 0;
  }
  .footer ul {
      list-style: none;
      padding-left: 0;
  }
  .footer ul li {
      margin-bottom: 10px;
  }
  .footer .social-icons i {
      font-size: 2em;
      margin-right: 10px;
  }
  </style>
  