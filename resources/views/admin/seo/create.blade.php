@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Создать новую SEO запись</h1>
        <p>Используйте форму внизу для создания.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/save-seo') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label>Title</label>
              <input value="{{ old('title') }}" placeholder="" type="text" name = "title" class="form-control" />
              @if ($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Description</label>
              <input value="{{ old('description') }}" placeholder="" type="text" name = "description" class="form-control" />
              @if ($errors->has('description'))
                  <span class="help-block">{{ $errors->first('description') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Keywords</label>
              <input value="{{ old('keywords') }}" placeholder="" type="text" name = "keywords" class="form-control" />
              @if ($errors->has('keywords'))
                  <span class="help-block">{{ $errors->first('keywords') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Route/URL</label>
              <input value="{{ old('route') }}" placeholder="" type="text" name = "route" class="form-control" />
              @if ($errors->has('route'))
                  <span class="help-block">{{ $errors->first('route') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Locale</label>
              <div class="select-wrapper">              
                <select name="locale">
                  @foreach(Config::get('noccms.seoLocales') as $seoLocale => $properties)
                    <option value="{{$seoLocale}}">{{{ $properties['name'] }}}</option>
                  @endforeach                
                </select>             
              </div>
              @if ($errors->has('type'))
                  <span class="help-block">{{ $errors->first('type') }}</span>
              @endif              
            </div>      

            <div class="form-group buttons">                  
              <button type="submit" class="btn btn-yellow">Сохранить</button>
            </div>
        </form>        
      </div>
      <div class="r">
        <div class="tips">
          <p>- Будьте внимательны при заполнении.</p>
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
