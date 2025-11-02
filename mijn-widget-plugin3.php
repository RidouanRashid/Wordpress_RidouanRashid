public function widget_admin_script() {
    ?>
    <script>
    jQuery(document).ready(function($){
        function bindMediaUploader(context){
            $(context).find('.upload-image-button').off('click').on('click', function(e){
                e.preventDefault();
                var button = $(this);
                var input = button.prev('.image-upload');

                var mediaUploader = wp.media({
                    title: 'Kies een afbeelding',
                    button: { text: 'Selecteer afbeelding' },
                    multiple: false
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    input.val(attachment.url);
                });

                mediaUploader.open();
            });
        }

        // Binden aan bestaande widgets
        bindMediaUploader(document);

        // Binden aan widgets die dynamisch worden toegevoegd
        $(document).on('widget-added widget-updated', function(event, widget){
            bindMediaUploader(widget);
        });
    });
    </script>
    <?php
}
