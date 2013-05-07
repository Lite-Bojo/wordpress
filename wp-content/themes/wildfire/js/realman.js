jQuery(document).ready(function($) {
var this_form_id = $('input#gform_form_id').val();
  //skrinka select
  var skrinka_select = $('div.gform_body > ul > li.skrinka > div.ginput_container > select');
  skrinka_select.append('<option data-type="skrinka" data-id="0" value="Ziadna Skrinka|0" price="">Ziadna Skrinka</option>');
   $('div.product_desc').click(function (e) {
     e.preventDefault();
     var target = $(this).find('div.product_tooltip');
     if (target.css('display') !== 'none') {
        target.css('display', 'none');
     } else{
      $('div.options_pc').find('div.product_tooltip').css('display', 'none');
      target.css('display', 'block');
     }
   });
  function li_click(){       
    $('li.cases_overflow_li').click(function(e) {
      e.preventDefault();
      $('div.main_image > a').fadeTo( 5, 0.8 );
      $('div.main_image').append('<div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div>');
                  jQuery.ajax({
                    url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php', 
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        action: 'thumbnail_obr',
                        post_parent: $(this).data('id')},
                    complete: function() {
                      //called when complete
                    },
                    success: function(data) {
                    var cena_skrinky=parseFloat(data.cena);
                    $('div.main_image, div.custom_images').empty();
                    $('div.animation_icon').remove();
                    $('div.custom_images').append(data.obr);
                    //update ceny skrinky
                    skrinka_select.html('<option data-type="skrinka" data-id="0" value="'+data.nazov+'|'+data.cena+'" price="">'+data.nazov+'</option>');
                    update_dynamic_price(cena_skrinky+parseFloat($('span.formattedTotalPrice > span.amount').html()));
                    var first_src_medium=$('div.custom_images').find('img').first().attr('src').replace('-thumbnail', '-medium');
                    var first_src_large=$('div.custom_images').find('img').first().attr('src').replace('-thumbnail', '-large');
                    $('div.main_image').html('<img src="' + first_src_medium + '" class="attachment-thumbnail" alt="Node304_backview_hires">');
                    $('div.main_image > img').wrap('<a href="' + first_src_large + '" class="MYCLASS" title="PC">');
                    $('.MYCLASS').jqzoom({
                                title:false,
                                zoomWidth:400,
                                zoomHeight:275
                              }); 

                    $('div.custom_images img').click(function(){
                      var src_thum = $(this).attr("src");
                      var src_medium = src_thum.replace('-thumbnail', '-medium');
                      var src_large = src_medium.replace('-medium', '-large');
                      $('div.main_image').empty();
                      $('div.main_image').html('<img src="' + src_medium + '" class="attachment-thumbnail" alt="Node304_backview_hires">');
                      $('div.main_image > img').wrap('<a href="' + src_large + '" class="MYCLASS" title="PC">');
                          $('.MYCLASS').jqzoom({
                                title:false,
                                zoomWidth:400,
                                zoomHeight:275
                              }); 
                          });
                    },
                    error: function() {
                      $('div.main_image').html('<p>Načitanie obrazku zlyhalo.</p>');
                    }
                  });
      
    });}li_click();
    /*CHECKBOX SHIII*/
    $( "input[type=checkbox]" ).click(function(){
    $('ul.cases_overflow > li').fadeTo( 5, 0.8 );
    var sended_string = $( "input:checked" ).map(function() {
      return this.value + '=' + this.name;
    }).get().join();
      $.ajax({
        url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {action: 'custom_pc_filter',
              sended_string: sended_string},
        complete: function() {
          //called when complete
        },
        success: function(data) {
          $('ul.cases_overflow').empty();
          $('ul.cases_overflow').append(data);
          li_click();
        },
        error: function() {
          $('ul.cases_overflow').empty();
          $('ul.cases_overflow').append('Chyba skuste znova prosim.');
        }
      });
    });

        /*SUBMIT VALIDATION COMPONENTS TODO
    $("form.cart").submit(function() {
     if ($("div.product_tooltip_image").data('power') == 150) {
      
     return true;
      }else{$('div.alert alert-error').html('Zle maš volty jeblina odporucam aby si isiel odtialto strasne rychlo doriti!');
      return false;};

      });
      */

    /*ORANGE EYE PREVIEW SELECTED ITEM*/
$('form.cart').find('select').on('change', function() {
  var identifikator = $(this).attr('name');
  var selected_id = $(this).find(":selected").data('id');
  var selected_table = $(this).find(":selected").data('bojo');
  $.ajax({
      url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php',
      type: 'post',
      dataType: 'json',
      data: {
        action: 'description_part',
        selected_id: selected_id, 
        selected_table: selected_table
      },
      success: function (data) {
        if ($('div.'+identifikator).hasClass('product_desc-red')) {$('div.'+identifikator).removeClass('product_desc-red')};
        $('div.'+identifikator).html('<a href="#" class="href_desc"></a><div class="product_tooltip"><div class="product_tooltip_image"><img src="'+data.Imagelink+'" alt=""></div><div class="product_tooltip_popis"><b>'+data.ShortDesc+'</b><br><br>'+data.LongDesc+'</div></div>');
      }
    });
});

$('div.product_desc').click(function() {
  if ($(this).hasClass('product_desc-red')) {$(this).removeClass('product_desc-red')} else{$('div.product_desc').removeClass('product_desc-red');$(this).addClass('product_desc-red')};
});

$('form.cart').find('select').each(function() {
  var identifikator = $(this).attr('name');
  var selected_id = $(this).find(":selected").data('id');
  var selected_table = $(this).find(":selected").data('bojo');
  $.ajax({
      url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php',
      type: 'post',
      dataType: 'json',
      data: {
        action: 'description_part',
        selected_id: selected_id, 
        selected_table: selected_table
      },
      success: function (data) {
        $('div.'+identifikator).html('<a href="#" class="href_desc"></a><div class="product_tooltip"><div class="product_tooltip_image"><img src="'+data.Imagelink+'" alt=""></div><div class="product_tooltip_popis"><b>'+data.ShortDesc+'</b><br><br>'+data.LongDesc+'</div></div>');
      }
    });
});

});