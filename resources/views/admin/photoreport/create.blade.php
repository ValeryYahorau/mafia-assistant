@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Create new photoreport</h1>
        <p>Please use form below to create new photoreport.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/save-photoreport') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label>Title EN</label>
              <input value="{{ old('title_en') }}" placeholder="" type="text" name = "title_en" class="form-control" />
              @if ($errors->has('title_en'))
                  <span class="help-block">{{ $errors->first('title_en') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Title RU</label>
              <input value="{{ old('title_ru') }}" placeholder="" type="text" name = "title_ru" class="form-control" />
              @if ($errors->has('title_ru'))
                  <span class="help-block">{{ $errors->first('title_ru') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label>Date</label>
              <input name="date" type="text" id="datepicker" value="{{ old('date') }}">
              @if ($errors->has('date'))
                  <span class="help-block">{{ $errors->first('date') }}</span>
              @endif              
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
          <p>- Title and date are required.</p>
          <p>- After saving this information you will be redirected to page where you can upload images.</p>
          <p>- Images: use right button "Upload" for uploading images from your pc.</p>
          <p>- Not recomemded to upload images more than 2MB.</p>
        </div>
      </div>      
    </div>
  </div>
@endsection

@section('page-js')
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>  
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
