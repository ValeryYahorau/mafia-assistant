@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Изменить свойство</h1>
        <p>Пожалуйста используйте форму что бы изменить значение свойства.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/update-property') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="property_id" value="{{ $property->id }}"> 
            <input type="hidden" name="key" value="{{ $property->key }}"> 
            <input type="hidden" name="description" value="{{ $property->description }}"> 
            <input type="hidden" name="locale" value="{{ $property->locale }}"> 

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label>Значение</label>
              <input value="{{$property->value}}" placeholder="" type="text" name = "value" class="form-control" />
              @if ($errors->has('value'))
                  <span class="help-block">{{ $errors->first('value') }}</span>
              @endif
            </div> 

            <div class="form-group buttons">                  
              <button type="submit" class="btn btn-yellow">Сохранить</button>
            </div>
        </form>        
      </div>
      <div class="r">
        <div class="tips">
          <p>- Не удаляйся специальные символы "&lsaquo;br/&rsaquo;" и разделитель "|" при редактировании.>
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
          $('.p1').attr('src', e.target.result);
          $('.pb1').show();
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    function readURL2(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.p2').attr('src', e.target.result);
          $('.pb2').show();
        }
        reader.readAsDataURL(input.files[0]);
      }
    }       
    $("#file-1").on('change',function(){
      readURL(this);
    });
    $("#file-2").on('change',function(){
      readURL2(this);
    });   
  </script>
@endsection