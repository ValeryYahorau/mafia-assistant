@extends('layouts.admin')

@section('page-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/jquery-ui-1.11.4.custom/melon.datepicker.css') }}">  
@endsection

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Edit event</h1>
        <p>Please use form below to edit event.</p>
      </div>
      <div class="r"></div>
    </div>  
    <div class="entity-form">
      <div class="l">
        <form action="{{ LaravelLocalization::localizeURL('/admin/update-event') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="event_id" value="{{ $event->id }}"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label>Title EN</label>
              <input value="{{$event->title_en}}" placeholder="" type="text" name = "title_en" class="form-control" />
              @if ($errors->has('title_en'))
                  <span class="help-block">{{ $errors->first('title_en') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Title RU</label>
              <input value="{{$event->title_ru}}" placeholder="" type="text" name = "title_ru" class="form-control" />
              @if ($errors->has('title_ru'))
                  <span class="help-block">{{ $errors->first('title_ru') }}</span>
              @endif
            </div> 

            <div class="form-group">
              <label>Short Title EN</label>
              <input value="{{$event->short_title_en}}" placeholder="" type="text" name = "short_title_en" class="form-control" />
              @if ($errors->has('short_title_en'))
                  <span class="help-block">{{ $errors->first('short_title_en') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Short Title RU</label>
              <input value="{{$event->short_title_ru}}" placeholder="" type="text" name = "short_title_ru" class="form-control" />
              @if ($errors->has('short_title_ru'))
                  <span class="help-block">{{ $errors->first('short_title_ru') }}</span>
              @endif
            </div> 

            <div class="form-group">
              <label>Short Desc EN</label>
              <input value="{{$event->short_desc_en}}" placeholder="" type="text" name = "short_desc_en" class="form-control" />
              @if ($errors->has('short_desc_en'))
                  <span class="help-block">{{ $errors->first('short_desc_en') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>Short Desc RU</label>
              <input value="{{$event->short_desc_ru}}" placeholder="" type="text" name = "short_desc_ru" class="form-control" />
              @if ($errors->has('short_desc_ru'))
                  <span class="help-block">{{ $errors->first('short_desc_ru') }}</span>
              @endif
            </div> 

            <div class="form-group">
              <label>Add to running line</label>
              {{ Form::checkbox('line', null, $event->line) }}
            </div>   
            <div class="form-group">
              <label>Button code</label>
              <input value="{{$event->button}}" placeholder="" type="text" name = "button" class="form-control" />
              @if ($errors->has('button'))
                  <span class="help-block">{{ $errors->first('button') }}</span>
              @endif
            </div> 

            <div class="form-group">
              <label>Body EN</label>
              <textarea name='body_en'class="form-control">{!! $event->body_en !!}</textarea>
            </div>
            <div class="form-group">
              <label>Body RU</label>
              <textarea name='body_ru'class="form-control">{!! $event->body_ru !!}</textarea>
            </div>

            <div class="form-group">
              <label>Date</label>
              <input name="date" type="text" id="datepicker" value="{{$event->date}}">
              @if ($errors->has('date'))
                  <span class="help-block">{{ $errors->first('date') }}</span>
              @endif              
            </div>
            <div class="form-group">
              <label>Image</label>
              <div>
                <input type="file" name="image" id="file-1" class="inputfile inputfile-1"/>
                <label for="file-1">
                  <span><i class="fa fa-upload"></i>
                  @if ( $event->img_path ) 
                    Choose new image
                  @else 
                    Choose an image
                  @endif  
                  </span>
                </label>
                @if ($errors->has('image'))
                  <span class="help-block">{{ $errors->first('image') }}</span>
                @endif 
              </div>
              @if ( $event->img_path )
                <div class="preview-block show">
                  <img id="preview" src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}" />
                </div>
              @else   
                <div class="preview-block hide">
                  <img id="preview" src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}" />
                </div>                          
              @endif
            </div>      
            <div class="form-group buttons">                  
              <button type="submit" class="btn btn-yellow">Save</button>
            </div>
        </form>        
      </div>
      <div class="r">
        <div class="tips">
          <p>- Title and date are required.</p>
          <p>- Video: Click "Insert" and choose "Insert/edit video". Then pasrt youtube or vimeo URL.</p>
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