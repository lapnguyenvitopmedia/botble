{!! Theme::partial('header') !!}
<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col-md-2">{!! Theme::partial('left') !!}</div>
        <div class="col-md-8">{!! Theme::partial('content') !!}</div>
        <div class="col-md-2">{!! Theme::partial('right') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Theme::partial('footer') !!}
        </div>
    </div>
    
</div>