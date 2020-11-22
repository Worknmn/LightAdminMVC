jQuery(document).ready(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }
    
    //**************OfferCategory
    jQuery(document).on("click", '.offercategory .editoffercategory', function (event) {
      event.preventDefault();
      var tr = jQuery(this.closest('tr'));
      //console.log('tr=', tr);
      //console.log(tr.find('.id').data('val'));
      var form = jQuery('.offercategory .formoffercategory');
      form.find("input[name='id']").val(tr.find('.id').data('val'));
      form.find("input[name='sort']").val(tr.find('.sort').data('val'));
      form.find("input[name='name']").val(tr.find('.name').data('val'));
      form.find("input[name='url']").val(tr.find('.url').data('val'));
      if (jQuery('.offercategory .editcathead').hasClass('invisible')) {
        jQuery('.offercategory .addcathead, .offercategory .editcathead').toggleClass('invisible');
      }
    });
    
    jQuery(document).on("click", ".offercategory .formoffercategory button[type='reset']", function (event) {
      var form = jQuery('.offercategory .formoffercategory');
      form.find("input[name='id']").val('');
      if (jQuery('.offercategory .addcathead').hasClass('invisible')) {
        jQuery('.offercategory .addcathead, .offercategory .editcathead').toggleClass('invisible');
      }
    }); 
    //**************OfferCategory end
    
    
    //**************OfferPropertyTypes
    jQuery(document).on("change", '.offerpropertytypes-add .choosetype', function (event) {
      event.preventDefault();
      var type = $(this).val();
      if (type!="") {
        //console.log("selVAL=",$(this).val());
        // /adminmvc/offerpropertytypes/+type+.php
        var ajaxdata = {
        	//action     : '/adminmvc/offerpropertytypes/get'+type,
        	//nonce_code : myajax.nonce
          //'term' : searchTerm // Отправляемые данные поля ввода
        };
                
				jQuery.ajax({
					url : '/adminmvc/offerpropertytypes/get'+type, // Ссылка на AJAX обработчик WP
					type: 'POST', // Отправляем данные методом POST
					data: ajaxdata,
					beforeSend: function() { // Перед отправкой данных
						//jQuery('.suggestblock .suggest').fadeOut(); // Скроем блок результатов
						//jQuery('.suggestblock .suggest').empty(); // Очистим блок результатов
						//jQuery('.result-search .preloader').show(); // Покажем загрузчик
					},
					success: function(result) { // После выполнения поиска
						//jQuery('.result-search .preloader').hide(); // Скроем загрузчик
						jQuery('.offerpropertytypes-add .typevalues').fadeIn().html(result); // Покажем блок результатов и добавим в него полученные данные
            console.log('resultajax=', result);
					}
				});
      }
    });
    //**************OfferPropertyTypes end 
    
    //**************Offers
    jQuery(document).on("change", '.offers-add .offercategoryid, .offers-edit .offercategoryid', function (event) {
      event.preventDefault();
      var id = $(this).val();
      console.log('id=', id);
      if (id!="") {
        //console.log("selVAL=",$(this).val());
        // /adminmvc/offerpropertytypes/+type+.php
        var ajaxdata = {
        	//action     : '/adminmvc/offerpropertytypes/get'+type,
        	//nonce_code : myajax.nonce
          //'term' : searchTerm // Отправляемые данные поля ввода
          'offercategoryid': id,
        };
                
				jQuery.ajax({
					url : '/adminmvc/offers/getpropertiesforcategory', // Ссылка на AJAX обработчик WP
					type: 'POST', // Отправляем данные методом POST
					data: ajaxdata,
					beforeSend: function() { // Перед отправкой данных
						//jQuery('.suggestblock .suggest').fadeOut(); // Скроем блок результатов
						//jQuery('.suggestblock .suggest').empty(); // Очистим блок результатов
						//jQuery('.result-search .preloader').show(); // Покажем загрузчик
					},
					success: function(result) { // После выполнения поиска
						//jQuery('.result-search .preloader').hide(); // Скроем загрузчик
						jQuery('.offers-add .typevalues').fadeIn().html(result); // Покажем блок результатов и добавим в него полученные данные
            jQuery('.offers-edit .properties').fadeIn().html(result);
            //console.log('resultajax=', result);
					}
				});
      }
    });
    
    jQuery(document).on("change paste keyup", ".offers-add input[name='name']", function (event) {
      //event.preventDefault();
      //var tr = jQuery(this.closest('tr'));
      //console.log('this=', this);
      //console.log('tr=', tr);
      //console.log(tr.find('.id').data('val'));
      var form = jQuery(this).closest('form');
      //form.find("input[name='id']").val(tr.find('.id').data('val'));
      //form.find("input[name='sort']").val(tr.find('.sort').data('val'));
      //form.find("input[name='name']").val(tr.find('.name').data('val'));
      var alias = translit(jQuery(this).val());
      var re = new RegExp('_', 'g');
      alias = alias.replace(re, '-'); //alias = alias.replace(/_/g, '-');
      alias = alias + '.php';
      form.find("input[name='url'], input[name='alias']").val(alias);
    });
    
    //**************Offers end
    
    //**************LandingCategory
    jQuery(document).on("click", '.landingcategory .editlandingcategory', function (event) {
      event.preventDefault();
      var tr = jQuery(this.closest('tr'));
      console.log('tr=', tr);
      console.log(tr.find('.id').data('val'));
      var form = jQuery('.landingcategory .formlandingcategory');
      console.log('form=', form);
      form.find("input[name='id']").val(tr.find('.id').data('val'));
      form.find("input[name='sort']").val(tr.find('.sort').data('val'));
      form.find("input[name='name']").val(tr.find('.name').data('val'));
      form.find("input[name='alias']").val(tr.find('.alias').data('val'));
      if (jQuery('.landingcategory .editcathead').hasClass('invisible')) {
        jQuery('.landingcategory .addcathead, .landingcategory .editcathead').toggleClass('invisible');
      }
    });
    
    jQuery(document).on("click", ".landingcategory .formlandingcategory button[type='reset']", function (event) {
      var form = jQuery('.landingcategory .formlandingcategory');
      form.find("input[name='id']").val('');
      if (jQuery('.landingcategory .addcathead').hasClass('invisible')) {
        jQuery('.landingcategory .addcathead, .landingcategory .editcathead').toggleClass('invisible');
      }
    }); 
    //**************LandingCategory end 
    
    //************************* union events
    
    jQuery(document).on("change paste keyup", ".offercategory .formoffercategory input[name='name'], .form-offerpropertytypes-add input[name='name'], .formlandingcategory input[name='name'], .form-organisations-add input[name='name']", function (event) {
      //event.preventDefault();
      //var tr = jQuery(this.closest('tr'));
      //console.log('this=', this);
      //console.log('tr=', tr);
      //console.log(tr.find('.id').data('val'));
      var form = jQuery(this).closest('form');
      //form.find("input[name='id']").val(tr.find('.id').data('val'));
      //form.find("input[name='sort']").val(tr.find('.sort').data('val'));
      //form.find("input[name='name']").val(tr.find('.name').data('val'));
      var alias = translit(jQuery(this).val());
      var re = new RegExp('_', 'g');
      alias = alias.replace(re, '-'); //alias = alias.replace(/_/g, '-');
      form.find("input[name='url'], input[name='alias']").val(alias);
    });
    
    //************************* union events end   

});



//********************utils
function translit(str){
	var sp = '_'; 
	var text = str.toLowerCase();
	var transl = { 
		'\u0430': 'a', '\u0431': 'b', '\u0432': 'v', '\u0433': 'g', '\u0434': 'd', '\u0435': 'e', '\u0451': 'e', '\u0436': 'zh',
		'\u0437': 'z', '\u0438': 'i', '\u0439': 'j', '\u043a': 'k', '\u043b': 'l', '\u043c': 'm', '\u043d': 'n', '\u043e': 'o',
		'\u043f': 'p', '\u0440': 'r', '\u0441': 's', '\u0442': 't', '\u0443': 'u', '\u0444': 'f', '\u0445': 'h', '\u0446': 'c', 
		'\u0447': 'ch', '\u0448': 'sh', '\u0449': 'shch', '\u044a': '\'', '\u044b': 'y', '\u044c': '', '\u044d': 'e', '\u044e': 'yu',
		'\u044f': 'ya',		
		'\u00AB': sp, '\u00BB': sp, // «»
		' ': sp, '_': sp, '`': sp, '~': sp, 
		'!': sp, '@': sp, '#': sp, '$': sp,
		'%': sp, '^': sp, '&': sp, '*': sp, '(': sp, ')': sp, '-': sp, '\=': sp,
		'+': sp, '[': sp, ']': sp, '\\': sp, '|': sp, '/': sp, '.': sp, ',': sp,
		'{': sp, '}': sp, '\'': sp, '"': sp, ';': sp, ':': sp, '?': sp, '<': sp,
		'>': sp, '№': sp					
	}
  var result = '';
	var curent_sim = '';
    for(i=0; i < text.length; i++) {
  		if(transl[text[i]] != undefined) {			
  			if(curent_sim != transl[text[i]] || curent_sim != sp){
  				result += transl[text[i]];
  				curent_sim = transl[text[i]];				
  			}					
  		} else {
  			result += text[i];
  			curent_sim = text[i];
  		}		
    }
	result = result.replace(/^_/, '').replace(/_$/, ''); // trim
	return result
}
//********************utils end