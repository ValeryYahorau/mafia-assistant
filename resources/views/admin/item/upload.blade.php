@extends('layouts.admin')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="admin-content top">
    <div class="head">
        <div class="l">
            <h1>Upload photos</h1>
            <p>Please use form below to upload photos.</p>
        </div>
        <div class="r"></div>
    </div>  
    <div class="entity-form">
        <div class="l">
            <h2>Click on the button or drop images to upload them.</h2>
            {!! Form::open(['url' => route('upload-photos'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}
                <div class="dz-message">
                    <p class="btn btn-yellow">Click here to upload.</p>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
                <div class="dropzone-previews" id="dropzonePreview"></div>
            {!! Form::close() !!}
            <div class="form-group buttons">
              <a href="/admin/item" class="btn btn-yellow">Save</a>
            </div>
            <div id="preview-template" style="display: none;">
                <div class="dz-preview dz-file-preview">
                    <div class="dz-image"><img data-dz-thumbnail=""></div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                    <div class="dz-success-mark">
                        <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <title>Check</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#16cc45" fill-opacity="0.9" fill="#16cc45" sketch:type="MSShapeGroup"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="dz-error-mark">
                        <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <title>error</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#df2727" stroke-opacity="0.198794158" fill="#df2727" fill-opacity="0.816519475">
                                    <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

      </div>
      <div class="r">
        <div class="tips">
          <p>- Images are uploaded as soon as you drop them.</p>
          <p>- Maximum allowed size of image is 8MB.</p>
        </div>
      </div>      
    </div>    
</div>
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/dropzone/dropzone-config.js') }}"></script>  
    <script type="text/javascript">
        $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"}).datepicker('widget').wrap('<div class="ll-skin-melon"/>');
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#preview').attr('src', e.target.result);
              $('.preview-block').show();
            }
            reader.readAsDataURL(input.files[0]);
          }
        }   
        $("input[type=file]").on('change',function(){
          readURL(this);
        });
    </script>
@endsection