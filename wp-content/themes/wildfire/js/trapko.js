jQuery(document).ready(function($) {
    /*OBR NA ZACIATKU*/
    var init_medium = $('div.main_image > img').attr("src");
    var init_large = init_medium.replace('-medium', '-large');
    $('div.main_image > img').wrap('<a href="' + init_large + '" class="MYCLASS" title="PC">');
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
                    zoomWidth:400,
                    zoomHeight:275,
                    title:false
                  }); 
              });
      /*OVERFLOW COMPUTERS VPRAVO HORE*/
  function li_click(){       
    $('li.cases_overflow_li').click(function() {
      $('div.main_image > a').fadeTo( 5, 0.8 );
      $('div.main_image').append('<div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div>');
                  jQuery.ajax({
                    url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php', 
                    type: 'POST',
                    data: {
                        action: 'thumbnail_obr',
                        post_parent: $(this).data('id')},
                    complete: function(xhr, textStatus) {
                      //called when complete
                    },
                    success: function(data, textStatus, xhr) {
                    $('div.main_image, div.custom_images').empty();
                    $('div.animation_icon').remove();
                    $('div.custom_images').append(data);
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
                    error: function(xhr, textStatus, errorThrown) {
                      $('div.main_image').html('<p>Načitanie obrazku zlyhalo.</p>');
                    }
                  });
      
    });}li_click();
    /*CHECKBOX SHIII*/
    $( "input[type=checkbox]" ).click(function(){
    $('ul.cases_overflow > li').fadeTo( 5, 0.8 );
    var sended_string = $( "input:checked" ).map(function() {
      return this.value + '=' + this.name
    }).get().join();
      $.ajax({
        url: 'http://192.168.0.127/wordpress/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {action: 'custom_pc_filter',
              sended_string: sended_string},
        complete: function(xhr, textStatus) {
          //called when complete
        },
        success: function(data) {
          $('ul.cases_overflow').empty();
          $('ul.cases_overflow').append(data);
          li_click();
        },
        error: function(xhr, textStatus, errorThrown) {
          $('ul.cases_overflow').empty();
          $('ul.cases_overflow').append('Chyba skuste znova prosim.');
        }
      });
    });
});