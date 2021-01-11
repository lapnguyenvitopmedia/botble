<div class="row">
    
</div>
<div class="row">
    <div class="inner-container">{!! Theme::content() !!}</div>
    @php
        
    @endphp
    <div>
        -------{{ Request()->parameter }}
        {{ Request::query('parameter') }}
    </div>
</div>

