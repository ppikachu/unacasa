/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        $(document).delegate(".filtro_idea", "click", function() {
          filterValue = $(this).attr('data-filter');
          $("[class='cocinas']").hide();
        });
      }
    },
    'cotizar': {
      init: function() {
        //monto_a_financiar
        $(document).delegate(".elije-modelo", "click", function() {
          $("#elegi-superficie").show();
          $.scrollTo('#elegi-superficie', 800, {offset:-120});
        });

        $(document).delegate(".precio", "click", function() {
          $("#calcula-cuotas").show();
          $precio = document.getElementById("valor_total").value;
          $monto_a_financiar = document.getElementById("monto_a_financiar").value;
          $porcentaje = document.getElementById("no_cuotas").value;
          $valor_total = format( "##.000,00", $(this).attr('precio') );
          $valor_total_sin_centavos = $valor_total.substring(0,$valor_total.length - 3);
          $valor_max_a_financiar = format( "##.000,00", $(this).attr('precio')*0.7);
          $valor_max_a_financiar_sin_centavos = $valor_max_a_financiar.substring(0,$valor_max_a_financiar.length - 3);
          document.getElementById("valor_total").value = $valor_total_sin_centavos;
          document.getElementById("monto_a_financiar").placeholder = "Max $"+$valor_max_a_financiar_sin_centavos;
        });

        var sel = document.getElementById('no_cuotas');
        var el = document.getElementById('monto_a_financiar');

        $(document).delegate("#limpiar", "click", function() {
          el.value="";
          sel.value="1";
          document.getElementById("monto_de_cuota").value = "";
        });

        function doSomething() {
          $precio = document.getElementById("valor_total").value;
          $monto_a_financiar = parseInt(document.getElementById("monto_a_financiar").value);
          $no_cuotas = parseInt(document.getElementById("no_cuotas").value);
          var e = document.getElementById("no_cuotas");
          var strUser = e.options[e.selectedIndex].getAttribute("porcentaje");
          $porcentaje = strUser;
          $monto_estimado_de_cuota = format( "##.000,00", ($monto_a_financiar*$porcentaje)/$no_cuotas );
          $monto_estimado_de_cuota_formateado = $monto_estimado_de_cuota.substring(0,$monto_estimado_de_cuota.length - 3);
          document.getElementById("monto_de_cuota").value = $monto_estimado_de_cuota_formateado;
        }

        $("#monto_a_financiar").on('change keydown paste input', function(){
          doSomething();
        });

        document.getElementById("no_cuotas").onchange = function(){
          $precio = document.getElementById("valor_total").value;
          $monto_a_financiar = parseInt(document.getElementById("monto_a_financiar").value);
          $no_cuotas = parseInt(document.getElementById("no_cuotas").value);
          $porcentaje = this.options[this.selectedIndex].getAttribute("porcentaje");
          $monto_estimado_de_cuota = format( "##.000,00", ($monto_a_financiar*$porcentaje)/$no_cuotas );
          $monto_estimado_de_cuota_formateado = $monto_estimado_de_cuota.substring(0,$monto_estimado_de_cuota.length - 3);
          document.getElementById("monto_de_cuota").value = $monto_estimado_de_cuota_formateado;
        };
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
