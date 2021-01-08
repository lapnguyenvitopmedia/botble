@if (is_plugin_active('banners'))

@extends('core/base::layouts.master')
@section('content')
    <body>
        <div class="h_iframe">
            <iframe src="{{url('/revslider-standalone/index.php?page=revslider')}}" width='100%' heigth='100%'
            frameborder="0" allowfullscreen  onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';"></iframe>
        </div>
    </body>
@stop
@endif

