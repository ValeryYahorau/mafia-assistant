@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Create new player</h1>
        <p>Please use form below to create new player.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/save-player') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label>Name RU</label>
                <input value="{{ old('name_ru') }}" placeholder="" type="text" name = "name_ru" class="form-control" />
                @if ($errors->has('name_ru'))
                    <span class="help-block">{{ $errors->first('name_ru') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label>Name EN</label>
              <input value="{{ old('name_en') }}" placeholder="" type="text" name = "name_en" class="form-control" />
              @if ($errors->has('name_en'))
                  <span class="help-block">{{ $errors->first('name_en') }}</span>
              @endif
            </div>

            <div class="form-group">
                <label>Sex</label>
                <div class="select-wrapper">
                    <select name="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                @if ($errors->has('sex'))
                    <span class="help-block">{{ $errors->first('sex') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label>Real Name</label>
              <input value="{{ old('real_name') }}" placeholder="" type="text" name = "real_name" class="form-control" />
              @if ($errors->has('real_name'))
                  <span class="help-block">{{ $errors->first('real_name') }}</span>
              @endif
            </div>

            <div class="form-group">
                <label>Type</label>
                <div class="select-wrapper">
                    <select name="type">
                        <option value="simple">Simple</option>
                        <option value="bronze">Bronze</option>
                        <option value="silver">Silver</option>
                        <option value="gold">Gold</option>
                        <option value="platinum">Platinum</option>
                    </select>
                </div>
                @if ($errors->has('type'))
                    <span class="help-block">{{ $errors->first('type') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Rating</label>
                {{ Form::checkbox('rating', old('rating')) }}
            </div>

            <div class="form-group">
              <label>Additional Info</label>
              <textarea name='info'class="form-control">{{ old('info') }}</textarea>
            </div>

            <div class="form-group">
              <label>Image</label>
              <div>
                <input type="file" name="image" id="file-1" class="inputfile inputfile-1"/>
                <label for="file-1"><span><i class="fa fa-upload"></i> Choose an image</span></label>
                @if ($errors->has('image'))
                  <span class="help-block">{{ $errors->first('image') }}</span>
                @endif 
              </div>
              <div class="preview-block">
                <img id="preview" src="#" />
              </div>
            </div>

            <div class="form-group buttons">                  
              <button type="submit" class="btn btn-yellow">Save</button>
            </div>
        </form>        
      </div>
      <div class="r">
        <div class="tips">
          <p>- Images: use right button "Upload" for uploading images from your pc.</p>
          <p>- Not recomemded to upload images more than 2MB.</p>
        </div>
      </div>      
    </div>
  </div>
@endsection

@section('page-js')
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>  
  <script type="text/javascript">
    tinymce.init({
      selector : "textarea",
      body_class: 'tinymce-kakak',
      skin: "noc",
      height: '180',
      relative_urls : false,
      menubar: "insert view format table",
      plugins : ["advlist autolink lists link image charmap print preview anchor", "insertdatetime media table contextmenu paste jbimages"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages",
    });
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
