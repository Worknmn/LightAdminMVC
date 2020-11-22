

</div>  <!--****** end-->

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery-migrate-1.4.1.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery-migrate-3.3.1.min.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap.min.js"></script>
    <!--<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>-->
    <script src="<?php echo URL; ?>js/sidebar.js"></script>
    <script src="<?php echo URL; ?>js/perfect-scrollbar.js"></script>
    <script src="<?php echo URL; ?>js/nanobar.js"></script>
    <script src="<?php echo URL; ?>js/sidebar.menu.js"></script>
    <script src="<?php echo URL; ?>assets/fancybox/jquery.fancybox-1.3.4.js"></script>
    <script src="<?php echo URL; ?>assets/tinymce/tinymce.min.js"></script>
    <script>
    	jQuery(function() {
    		new Nanobar().go(100);
    		new PerfectScrollbar('.scrollbar');
    	});
    </script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    
    
<script type="text/javascript">    
  jQuery(document).ready(function () {
  	jQuery('.iframe-btn').fancybox({
  		'width'	: 880,
  		'height'	: 570,
  		'type'	: 'iframe',
  		'autoScale'   : false
  	});
    /* 
      work with &crossdomain=1
  	//
  	// Handles message from ResponsiveFilemanager
  	//
  	function OnMessage(e){
  	  var event = e.originalEvent;
      console.log('event.data.sender=',event.data.sender);
  	   // Make sure the sender of the event is trusted
  	   if(event.data.sender === 'responsivefilemanager'){
  	      if(event.data.field_id){
  	      	var fieldID=event.data.field_id;
  	      	var url=event.data.url;
  					jQuery('#'+fieldID).val(url).trigger('change');
  					jQuery.fancybox.close();
            console.log('event.data=', event.data);
  					// Delete handler of the message from ResponsiveFilemanager
  					jQuery(window).off('message', OnMessage);
  	      }
  	   }
  	}

    
    //for test
  	function OnMessageAll(e){
  	  var eventall = e.originalEvent;
      console.log('eventall=',eventall);
    }    
    jQuery(window).on('message', OnMessageAll);
  
    // Handler for a message from ResponsiveFilemanager
  	jQuery('.iframe-btn').on('click',function(){
  	  jQuery(window).on('message', OnMessage);
  	});
    */
  
  });
  
function responsive_filemanager_callback(field_id){
	//console.log('field_id=',field_id);
  var rfminput=jQuery('#'+field_id);
	var url=rfminput.val();
  //console.log("rfminput.parent().find('.previewimgblock')=", rfminput.parent().find('.previewimgblock'));
  rfminput.parent().find('.previewimgblock').html('<img src="/thumbs/'+url+'" />')
	//alert('update '+field_id+" with "+url);
	//your code  
}
  
</script> 

<script>
  tinymce.init({
    selector: '#descriptioneditor, .form-landing .uptext, .form-landing .text, .form-landing .downtext',
    height: 500,
    plugins: [
		  "fullscreen table advlist autolink anchor link image media code responsivefilemanager paste contextmenu preview filemanager wordcount visualblocks visualchars nonbreaking lists" //
	  ],
    //menubar: 'table',
    //toolbar: 'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol'
  	toolbar1: "fullscreen | undo redo | styleselect | bold italic underline | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | forecolor backcolor | visualblocks visualchars nonbreaking | numlist bullist |",
  	toolbar2: "responsivefilemanager | link unlink | image media | code | youtube | preview | pastetext |", // flickr 
  	image_advtab: true,
  	//external_filemanager_path: "/adminmvc/filemanager/filemanager/", //work
    external_filemanager_path: "<?php echo URL; ?>filemanager/filemanager/",
  	filemanager_title: "Responsive Filemanager",
  	external_plugins: {
  		//"flickr": "../../js/tinymce/plugins/flickr/plugin.min.js",
  		//"youtube": "<?php echo URL; ?>assets/tinymce-plugins/youtube/plugin.min.js",
      "youtube": "<?php echo URL; ?>assets/tinymce/plugins/youtube/plugin.min.js",
  		"filemanager": "<?php echo URL; ?>filemanager/filemanager/plugin.min.js",
      "responsivefilemanager": "<?php echo URL; ?>filemanager/tinymce/plugins/responsivefilemanager/plugin.min.js",
  	},
});
</script>  

<!--
<script src="<?php echo URL; ?>assets/ckeditor5/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#descriptioneditor2' ))
        .catch( error => {
            console.error( error );
        } );
</script>
--> 
</body>
</html>
