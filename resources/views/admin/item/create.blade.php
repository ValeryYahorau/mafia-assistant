@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Create new item</h1>
        <p>Please use form below to create new item.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/save-item') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label>Category</label>
              <div class="select-wrapper">              
                <select name="category_id">
                  <option selected disabled>Choose:</option>
                  @foreach( $categories as $index => $category )
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>             
              </div>
              @if ($errors->has('category_id'))
                  <span class="help-block">{{ $errors->first('category_id') }}</span>
              @endif              
            </div> 

            <div class="form-group">
              <label>Title</label>
              <input value="{{ old('title') }}" placeholder="" type="text" name = "title" class="form-control" />
              @if ($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label>Short Description</label>
              <input value="{{ old('short_desc') }}" placeholder="" type="text" name = "short_desc" class="form-control" />
              @if ($errors->has('short_desc'))
                  <span class="help-block">{{ $errors->first('short_desc') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label>Body</label>
              <textarea name='body' class="form-control">{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
              <label>Position</label>
              {{Form::number('position', 'number')}}
              @if ($errors->has('position'))
                  <span class="help-block">{{ $errors->first('position') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label>Main Image</label>
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
          <p>- Title is are required.</p>
          <p>- After saving this information you will be redirected to page where you can upload images.</p>
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
      height: '210',
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
