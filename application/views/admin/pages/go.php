<html>

<head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" defer="defer" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" media="screen" rel="stylesheet" type="text/css">
    <style>
        #upload-preview-image {
            max-width: 100%;
        }

        #modal-upload-preview .cropper-bg {
            background: #000;
        }

        #modal-upload-preview .image-rotate-value {
            border: 0;
            text-align: center;
            width: 100%;
        }

    </style>
</head>

<body>
    <div id="crop-container" data-min-height="185" data-min-width="210">
    </div>
    <form action="" method="post">
        <input id="crop" type="file" name="filename">
        <input type="hidden" name="photoX" value="0" id="photoX">
        <input type="hidden" name="photoY" value="0" id="photoY">
        <input type="hidden" name="photoWidth" value="0" id="photoWidth">
        <input type="hidden" name="photoHeight" value="0" id="photoHeight">
        <input type="hidden" name="photoDegree" value="0" id="photoDegree">
        <div id="data-viewer"></div>
        <input type="submit" name="upload" value="upload">
    </form>
    <div class="modal" id="modal-upload-preview" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Oříznout a natočit obrázek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container" style="max-width: 100%;">
                        <img id="modal-upload-preview-image" src="">
                        <div style="position:relative;">
                            <input id="upload-photo-image-rotate-value" type="hidden" name="rangeInputValue" value="0">
                            <input id="upload-photo-image-rotate-value-text" class="image-rotate-value" type="text" name="rangeInputValueText" value="0°" readonly>
                            <input id="upload-photo-image-rotate" class="image-rotate" type="range" name="rangeInput" step="0.1" min="-100" max="100" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="done" class="button btn pull-right" type="button">Oříznout</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $("#crop").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.cropper-container').remove();
                    $('#upload-photo-image-rotate').val(0);
                    $('#upload-photo-image-rotate-value').val(0);
                    $('#upload-photo-image-rotate-value-text').val('0°');

                    var cropContainer = $('#crop-container');
                    var button = $('#done');

                    var image = new Image();
                    image.id = 'upload-preview-image';
                    image.src = e.target.result;
                    image.onload = function() {
                        $(cropContainer).html(image);
                    };

                    var cropBoxData;
                    var canvasData;
                    var cropper;

                    var modalImage = document.getElementById('modal-upload-preview-image');
                    modalImage.src = image.src;
                    cropper = new Cropper(modalImage, {
                        autoCropArea: 1,
                        minCropBoxHeight: $(cropContainer).data('min-height'),
                        minCropBoxWidth: $(cropContainer).data('min-width'),
                        scalable: false,
                        ready: function() {
                            cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                        }
                    });

                    $('#modal-upload-preview').on('shown.bs.modal', function() {
                        modalImage.onload = function() {
                            $(document).on("input", "#upload-photo-image-rotate", function() {
                                rotate(cropper, $(this).val());
                            });

                            $(document).on("change", "#upload-photo-image-rotate", function() {
                                rotate(cropper, $(this).val());
                            });

                            $(button).on('click', function() {
                                var canvas = cropper.getCroppedCanvas();
                                var data = cropper.getData();
                                $(cropContainer).html(canvas);

                                $('#photoX').val(data.x);
                                $('#photoY').val(data.y);
                                $('#photoWidth').val(data.width);
                                $('#photoHeight').val(data.height);
                                $('#photoDegree').val(data.rotate);
                                $('#modal-upload-preview').modal('hide');
                                $('#data-viewer').text(JSON.stringify(cropper.getData()));
                            });
                        };
                    }).on('hidden.bs.modal', function() {
                        cropBoxData = cropper.getCropBoxData();
                        canvasData = cropper.getCanvasData();
                        cropper.destroy();
                    }).modal('show');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function rotate(cropper, degree) {
            var rotateValue = document.getElementById('upload-photo-image-rotate-value');
            var rotateValueText = document.getElementById('upload-photo-image-rotate-value-text');
            rotateValue.value = degree;
            rotateValueText.value = degree.replace('.', ',') + '°';
            cropper.rotateTo(degree);
        }
    </script>
</body>

</html>