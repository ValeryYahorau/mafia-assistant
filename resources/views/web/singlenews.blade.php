@extends('layouts.web')

@section('content')
<div class="content snews animatedParent animateOnce">
    <div class="single-news">
        <div class="wrapper">
            <div class="title">
                <h1>{{ $news->title }}</h1>
            </div>
            <div class="snews-block">            
                <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$news->img_path}}"/>
                {!! $news->body !!}                                            
            </div>
            <div class="date">{{ $news->date }}</div>
        </div>
    </div>    
</div>   
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {

        });
        $(window).load(function() {
          setTimeout(function(){
              $('body').addClass('loaded');        
              $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset("web/css/animations.css") }}">');   
          }, 1000);
        });
    </script>   
@endsection
