var photo_counter = 0;
Dropzone.options.realDropzone = {
    previewsContainer: '#dropzonePreview',
    previewTemplate: $('#preview-template').html(),
    addRemoveLinks: true,
    dictRemoveFile: 'Delete',
    dictFileTooBig: 'Image is bigger than 8MB',

    // The setting up of the dropzone
    init:function() {

        this.on("removedfile", function(file) {
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                type: 'POST',
                url: '/delete-photo',
                data: {id: file.photoId},
                dataType: 'html',
                success: function(data){

                }
            });

        } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    }
}
