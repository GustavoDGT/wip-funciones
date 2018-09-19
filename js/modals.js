// Todo lo referente al 'show modal'
  var modal = (function(){
    return {
      show: function($this, $dataModal){
        var $idModal;
        //[A] Verificaciones importantes
          // Si es que se determinó un $dataModal
          if($dataModal == undefined) {
            if(!modal.verification($this, 'data-modal')) return;
            // Si el modal, yá está abierto lo cerramos.
            $idModal = $this.attr('data-modal'); //Identificador del Modal a mostrar
          } else {
            $idModal = $dataModal;
          }
          // Verificación existencial
          var $modal = $('#' + $idModal);
          if ($modal.length) {
            if($modal.hasClass('active_modal')) $modal.removeClass('active_modal');
          } else {
            var msg = 'There is no element in the DOM with the "' + $idModal + '" identifier.';
            console.error(msg);
            alert(msg)
            return false;
          }
        //[/A]

        //[B] Cosas generales.
          // Consultamos si existe una imagen para mostrar en el Modal
          var $modalImg = $modal.find('.lazy-img')
          if($modalImg.length) {
             var $dataSrcImg = $modalImg.attr('data-src'); 
            if(typeof($dataSrcImg) != 'undefined'){
              $modalImg.attr('src', $dataSrcImg).removeAttr('data-src');
            }
          }
          //
          // Cargando el 'Mini Mapa' si existe.
          var $mapImg = $modal.find('.min-map');
          if($mapImg.length) {
            var $dataMapImg = $mapImg.attr("data-map-img");
            if(typeof($dataMapImg) != 'undefined'){
              $mapImg.css("background-image","url('"+ $dataMapImg +"')").removeAttr('data-map-img');
            }
          }
          //
          // Focuceando el primer input
            setTimeout(function(){
              $modal.find('form input').eq(0).focus();
            }, 400);
          //
        //[/B]

        //[C] Trabajando con modales específicos
          // Variables generales para algunos case:
            var $tabProperties = $('#tab-my-properties');
            var $tabFavorites = $('#tab-favorite-list');
            var $dgtForm = $('.dgtFormAction');
          //
          switch($idModal) {
            case 'modal_save_search':
              var $propertiesFound = $('#properties-found');
              if($propertiesFound.length) {
                var $counter = parseInt($propertiesFound.find('span').html().replace(',', ''));
                var $formSaveSearch = $('#form-save-search input, #form-save-search select');
                var $submitSaveSearch = $('#submit_save_search');
                var $saveSearch = $('#msg-save-search');
                var $nameSearch = $('#idx_name_save_search');
                var $saveCounter = $('#save_counter');
                if ($counter > dgtCredential.max_counter_save_search) {
                  $formSaveSearch.attr('disabled', true);
                  $submitSaveSearch.hide();
                  $saveSearch.show();
                  // return false;
                } else {
                  $formSaveSearch.attr('disabled', false);
                  var d = new Date();
                  var datestring = (d.getMonth() + 1) + "-" + d.getDate() + "-" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes();
                  $nameSearch.val('Save search * ' + datestring);
                  $saveCounter.val($counter);
                  $submitSaveSearch.show();
                  $saveSearch.hide();
                }
              }
              break;
            case 'btn-schedule':
            case 'btn-email-to-friend':
              $modal.find('.modal_address').html($this.data('address'));
              $modal.find('.modal_sysid').val($this.data('id'));
              $modal.find('#fs_date').datepicker();
              break;
            case 'modal_email_to_friend_multiple':
              var $idxType = $modal.find('.idx-type');
              var $idxListid = $modal.find('.idx-listid');
              if($idxListid.length) {
                if($idxListid.val !== '' && $idxListid.val()){ // Si es diferente a nada y es verdadero
                  $modal.addClass('reload-form');
                  if($tabProperties.hasClass('active')) {
                    $idxType.val('properties');
                  } else if($tabFavorites.hasClass('active')) {
                    $idxType.val('buildings');
                  }
                } else {
                  if(!$this.hasClass('alert-showing')) {
                    $this.addClass('alert-showing');
                    if($tabProperties.hasClass('active')) {
                      $this.after('<div class="message-alert" style="display:none;margin-top:1em">Select one or more properties.</div>');
                    } else if($tabFavorites.hasClass('active')) {
                      $this.after('<div class="message-alert" style="display:none;margin-top:1em">Select one or more buildings.</div>');
                    }
                    var $messageAlert = $('.message-alert');
                    setTimeout(function(){
                      $messageAlert.fadeIn('slow');
                    }, 500);
                    setTimeout(function(){
                      $messageAlert.fadeOut('slow');
                    }, 4500);
                    setTimeout(function(){
                      $messageAlert.remove();
                      $this.removeClass('alert-showing');
                    }, 5500);
                    return false;
                  }
                }
              } else {
                console.error('Dont exits the input hidde: idx-listid');
              }
              break;
            case 'modal_schedule':
              // Identificando si el modal es de 'profile' o de 'property detail'
                var $h2Addres, $dataId;
                // 'Property Detail'
                $h2Addres = $this.attr('data-address');
                if ($h2Addres !== undefined) {
                  $dataId = $this.attr('data-id');
                } else { // de 'profile'
                  var $propertie = $this.parents('.propertie');
                  $h2Addres = $propertie.find('h2').text();
                  $dataId = $propertie.attr('data-id');
                }
                if($h2Addres != '') {
                  $modal.find('#subtext-schedule').html($h2Addres);
                  $modal.find('.idx-npost').val($h2Addres);
                  $modal.find('.idx-sysid').val($dataId);
                }
                // data Type
                var $dataType = $this.attr('data-type');
                if($dataType !== undefined) $modal.find('.idx-ntype').val($dataType);
                // Identificando la lista  de donde viene el modal_schedule
                var $idxNtype = $modal.find('.idx-ntype');
                if($tabProperties.hasClass('active')) {
                  $idxNtype.val('property');
                } else if($tabFavorites.hasClass('active')) {
                  $idxNtype.val('building');
                }
              break;
          }
        //[/C]

        //[D] finalmente Activando el modal y agregando clase al HTML
          $modal.addClass('active_modal');
          //if (!$('html').hasClass('modal_mobile')) $('html').addClass('modal_mobile'); // Para esconder el scroll
        //[D]
      },
      hide: function($this){
        // deteniendo el cierre si la comprobación devuelve false.
        if(!modal.verification($this, 'data-id')) return; 
        // Identificando el modal a cerrar para realizar alguna acción en específica.
        var $idModal = $this.attr('data-id');
        switch($idModal){
          case 'modal_property_detail':
            pidUrl();
            break;
          case 'modal_email_to_friend':
          case 'modal_schedule_showing':
          case 'modal_login':
            // Limpiando los inputs correspondientes al cerrar.
            $this.find('input').each(function(){
              var $inputType = $(this).attr('type');
              if ($inputType !== 'hidden' && $inputType !== 'submit') { // no limpiar éstos tipos de input
                $(this).val('');
              }
            });
            break;
          case 'modal_img_propertie':
            setTimeout(function(){
              var $titleModal = $('#modal_img_propertie .title');
              $titleModal.html($titleModal.attr('data-titlebk'))
              $titleModal.removeAttr('data-titlebk');
            }, 500);
            break;
        }
        // quitando el active al modal
        $('#' + $idModal).removeClass('active_modal'); 
        // Buscamos si existe otro modal activo para no retirar la clase del HTML q quita el scroll
        //if(!$('#content-modals .active_modal').length) $('html').removeClass('modal_mobile'); // para regresar el scroll
      },
      verification: function($btn, dataAttr){
        // Si no existe el atributo 'data modal'
        var $idModal = $btn.attr(dataAttr); //Identificador del Modal a mostrar
        if($idModal == undefined) {
          var msg = 'Missing the '+ dataAttr + ' attribute, it is not known which modal to open.';
          console.error(msg);
          alert(msg)
          return false;
        }
        // Si no existe en el DOM el elemento identificado
        var $modal = $('#' + $idModal);
        if (!$modal.length) {
          var msg = 'There is no element in the DOM with the "' + $idModal + '" identifier.';
          console.error(msg);
          alert(msg)
          return false;
        }
        return true;
      }
    }
  })();
  //

  // Abriendo el modal
  $('body').on('click', '.show-modal', function(e) {
    e.preventDefault();
    modal.show($(this));
  });

  // Cerrando el modal
  $('body').on('click', '.close-modal', function(e) {
    e.preventDefault();
    modal.hide($(this));
  });
//