@extends('core/base::layouts.master')

@section('content')
<div>
    <iframe src="{{ $url }}" width="100%" height="100%"
        frameborder=0 id="sliderFrame"
        onload="this.style.height=(this.contentWindow.document.body.scrollHeight)+'px';">
    </iframe>
</div>
@endsection
