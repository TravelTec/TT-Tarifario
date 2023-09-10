jQuery(document).ready(function($){

    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;

    $('#submit').click(function(e){
        setTimeout( function() { 
            $('.div_imagem_hoteis').attr('style', 'display:none;');
            $('.div_imagem_aptos').attr('style', 'display:none;');
        }, 1500 ); 
    });

    // Runs when the image button is clicked.
    $('#upload_image_btn_hoteis').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#txt_upload_image_hoteis').val(media_attachment.url);
            $('#imagem_hoteis').attr('src', media_attachment.url);
            $('.div_imagem_hoteis').attr('style', 'width: 33%;margin: 8px 0px 12px 0px;');
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

    // Runs when the image button is clicked.
    $('#upload_image_btn_aptos').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#txt_upload_image_aptos').val(media_attachment.url);
            $('#imagem_aptos').attr('src', media_attachment.url);
            $('.div_imagem_aptos').attr('style', 'width: 33%;margin: 8px 0px 12px 0px;');
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

});