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
        // JavaScript to be fired on the home page
        /*$('.flexslider').flexslider({
            slideshow: false,
            animation: "slide"
            // initDelay: 100000,
            // useCSS: false
            // ,controlsContainer: $(".custom-controls-container"),
            // customDirectionNav: $(".custom-navigation a")
        });*/
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        $(document).delegate(".filtro_idea", "click", function() {
          filterValue = $(this).attr('data-filter');
          //$(this).hide();
          $("[class='cocinas']").hide();
        });
      }
    },
    // About us page, note the change from about-us to about_us.
    'cotizar': {
      init: function() {
        Number.prototype.format = function(n, x) {
            var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
        };
        // JavaScript to be fired on the about us page
        $("ul.nav-tabs a").click(function (e) {
          e.preventDefault();
            $(this).tab('show');
        });
        //monto_a_financiar

        $(document).delegate(".precio", "click", function() {
          $precio=document.getElementById("valor_total").value;
          $monto_a_financiar=document.getElementById("monto_a_financiar").value;
          $porcentaje=document.getElementById("no_cuotas").value;
          console.log($precio);
          console.log($monto_a_financiar);
          document.getElementById("valor_total").value = Math.round($(this).attr('precio')).format(2);
          //document.getElementById("valor_total").value = Math.round($(this).attr('precio'));
          //document.getElementById("monto_de_cuota").value = Math.round($precio).format(2);
        });


        var sel = document.getElementById('no_cuotas');
        var el = document.getElementById('monto_a_financiar');

        $(document).delegate("#limpiar", "click", function() {
          el.value="";
          sel.value="1";
          document.getElementById("monto_de_cuota").value = "";
        });


        document.getElementById("no_cuotas").onchange = function(){
          $precio=document.getElementById("valor_total").value;
          $monto_a_financiar=parseInt(document.getElementById("monto_a_financiar").value);
          $no_cuotas=parseInt(document.getElementById("no_cuotas").value);
          $porcentaje=this.options[this.selectedIndex].getAttribute("porcentaje");
          console.log("porcentaje:"+$porcentaje);
          console.log("monto_a_financiar:"+$monto_a_financiar);
          console.log("cuotas:"+$no_cuotas);
          //console.log(this.options[this.selectedIndex].getAttribute("porcentaje"));
          //document.getElementById("monto_de_cuota").value = Math.round($precio/document.getElementById("no_cuotas").value).format(2);
          document.getElementById("monto_de_cuota").value = Math.round(($monto_a_financiar*$porcentaje)/$no_cuotas).format(2);
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
