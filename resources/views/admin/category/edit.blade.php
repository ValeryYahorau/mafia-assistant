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
        <h1>Edit category</h1>
        <p></p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/update-category') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="category_id" value="{{ $category->id }}">  
            <div class="form-group">
              <label>Title</label>
              <input value="{{$category->title}}" placeholder="" type="text" name = "title" class="form-control" />
              @if ($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label>Desciption</label>
              <textarea name='body' class="form-control">{!! $category->description !!}</textarea>
            </div>

            <div class="form-group buttons">                  
              <button type="submit" class="btn btn-yellow">Save</button>
            </div>
        </form>        
      </div>
      <div class="r">
        <div class="tips">
          <p>- Title is required.</p>
        </div>
      </div>      
    </div>   
</div>
@endsection

@section('page-js')
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>  
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/dropzone/dropzone.js') }}"></script>
  <script type="text/javascript" src="{{ asset('noc_admin/plugins/dropzone/dropzone-config.js') }}"></script>  
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
  </script>
@endsection
