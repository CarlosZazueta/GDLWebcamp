(function () {
  "use strict";


  let regalo = document.getElementById('regalo');

  document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('mapa')) {
      var map = L.map('mapa').setView([20.674781, -103.38749], 18);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([20.674781, -103.38749]).addTo(map)
        .bindPopup('GDLWebCamp 2018.<br> Boletos ya disponibles!.')
        .openPopup();
    }

    // Campos datos usuario
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let email = document.getElementById('email');

    // Campos pases
    let pase_dia = document.getElementById('pase_dia');
    let pase_completo = document.getElementById('pase_completo');
    let pase_dosdias = document.getElementById('pase_dosdias');

    // Botones y divs
    let calcular = document.getElementById('calcular');
    let error_div = document.getElementById('error');
    let registro = document.getElementById('btnRegistro');
    let lista_productos = document.getElementById('lista-productos');
    let suma_total = document.querySelector("#suma-total");

    registro.disabled = true;

    // Extras
    let camisa_evento = document.getElementById('camisa_evento');
    let etiquetas = document.getElementById('etiquetas');


    if (calcular) {
      calcular.addEventListener('click', calcularMontos);

      pase_dia.addEventListener('blur', mostrarDias);
      pase_dosdias.addEventListener('blur', mostrarDias);
      pase_completo.addEventListener('blur', mostrarDias);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarMail);

      function validarMail() {
        if (this.value.indexOf("@") > -1) {
          error_div.style.display = 'none';
          this.style.border = "1px solid #cccccc";
          error_div.style.border = 'none';
        } else {
          error_div.style.display = 'block';
          error_div.innerHTML = "Dirección de correo no válida";
          this.style.border = "1px solid red";
          error_div.style.border = '1px solid red';
        }
      }

      function validarCampos() {
        if (this.value === '') {
          error_div.style.display = 'block';
          error_div.innerHTML = "Este campo es obligatorio";
          this.style.border = "1px solid red";
          error_div.style.border = '1px solid red';
        } else {
          error_div.style.display = 'none';
          this.style.border = "1px solid #cccccc";
          error_div.style.border = 'none';
        }
      }

      function calcularMontos(event) {
        event.preventDefault();

        if (regalo.value == '') {
          alert("Debes elegir un regalo");
          regalo.focus();
        } else {
          let boletosDia = parseInt(pase_dia.value, 10) || 0,
            boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
            boletosCompleto = parseInt(pase_completo.value, 10) || 0,
            cantidadCamisas = parseInt(camisa_evento.value, 10) || 0,
            cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;

          let totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) + ((cantidadCamisas * 10) * 0.93) + (cantidadEtiquetas * 2);

          let listadoProductos = [];

          if (boletosDia >= 1) {
            listadoProductos.push(boletosDia + ' Pases por día');
          }

          if (boletos2Dias >= 1) {
            listadoProductos.push(boletos2Dias + ' Pases por 2 días');
          }

          if (boletosCompleto >= 1) {
            listadoProductos.push(boletosCompleto + ' Boletos completos');
          }

          if (cantidadCamisas >= 1) {
            listadoProductos.push(cantidadCamisas + ' Cantidad camisas');
          }

          if (cantidadEtiquetas >= 1) {
            listadoProductos.push(cantidadEtiquetas + ' Cantidad etiquetas');
          }

          lista_productos.style.display = "block";
          lista_productos.innerHTML = '';
          for (let index = 0; index < listadoProductos.length; index++) {
            lista_productos.innerHTML += listadoProductos[index] + '<br/>';
          }

          suma_total.innerHTML = "$ " + totalPagar.toFixed(2);
          registro.disabled = false;

          document.getElementById("total_pedido").value = totalPagar;
        }
      }

      function mostrarDias() {
        let boletosDia = parseInt(pase_dia.value, 10) || 0,
          boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
          boletosCompleto = parseInt(pase_completo.value, 10) || 0;

        let diasElegidos = [];

        if (boletosDia > 0) {
          diasElegidos.push('viernes');
        }

        if (boletos2Dias > 0) {
          diasElegidos.push('viernes', 'sabado');
        }

        if (boletosCompleto > 0) {
          diasElegidos.push('viernes', 'sabado', 'domingo');
        }

        for (let index = 0; index < diasElegidos.length; index++) {
          document.getElementById(diasElegidos[index]).style.display = 'block';
        }
      }
    }

  }); //DOM Content Loaded
})();

$(function () {

  // Lettering
  $('.nombre-sitio').lettering();

  //Agregar clase a menú
  $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

  // Menú fijo
  let windowHeight = $(window).height();
  let barraAltura = $('.barra').innerHeight();

  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({
        'margin-top': barraAltura + 'px'
      });
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({
        'margin-top': '0px'
      });
    }
  });

  // Menú responsive
  $('.menu-movil').on('click', function () {
    $('.navegacion-principal').slideToggle();
  });

  // Programa de conferencias
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function () {
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    $('.ocultar').hide();

    let enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);

    return false;
  });

  // Animaciones para los números
  let resumenLista = $('.resumen-evento');
  if (resumenLista) {
    if (resumenLista.length > 0) {
      $('.resumen-evento').waypoint(function () {
        $('.resumen-evento li:nth-child(1) p').animateNumber({
          number: 6
        }, 1200);
        $('.resumen-evento li:nth-child(2) p').animateNumber({
          number: 15
        }, 1200);
        $('.resumen-evento li:nth-child(3) p').animateNumber({
          number: 3
        }, 1500);
        $('.resumen-evento li:nth-child(4) p').animateNumber({
          number: 9
        }, 1500);
      }, {
        offset: '60%'
      });
    }
  }

//   // Contador
//   if ($('.cuenta-regresiva')) {
//     $('.cuenta-regresiva').countdown('2019/10/12 09:00:00').on('update', function (event) {
//       $('#dias').html(event.strftime('%D'));
//       $('#horas').html(event.strftime('%H'));
//       $('#minutos').html(event.strftime('%M'));
//       $('#segundos').html(event.strftime('%S'));
//     });
//   }

  //Colorbox
  if ($('.invitado-info')) {
    $('.invitado-info').colorbox({
      inline: true,
      width: "50%"
    });
  }

  if('.boton_newsletter'){
    $('.boton_newsletter').colorbox({
      inline: true,
      width: "50%"
    });
  }
});
