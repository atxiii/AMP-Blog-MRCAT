(function($) {
    'use strict';

    jQuery(document).ready(function($) {
        upload_media();
        amp_mrcat_update_cache();
    });
})(jQuery);

function upload_media(){
    $('#upload-logo , #upload-fav').click(function(e) {
        let name = $(this).attr('name');
        e.preventDefault();
        var image = wp.media({
                title: 'Upload Logo',
                // multiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e) {
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                // console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                // Let's assign the url value to the input field
                console.log(image_url);
                $('#'+name).val(image_url);
            });
    });
}

function amp_mrcat_update_cache(){
    $('#update_cache_btn').on('click',function(){
        var data = {
			'action': 'amp_mrcat_update_cache',
			'status_cache_amp': true
		};
		jQuery.post(ajaxurl, data, function(response) {
			alert('Got this from the server: ' + response);
		});
    });
}