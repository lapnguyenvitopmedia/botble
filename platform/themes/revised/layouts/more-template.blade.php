@php
$page = Theme::get('page');
@endphp
{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    <section data-background="{{ Theme::asset()->url('images/page-intro-02.jpg') }}" class="page-intro"
        style="background-image: url(<?php echo asset('storage/'.$page->image); ?>)">
        <div class="container">
            <h3 class="page-intro__title">{{ Theme::get('section-name') }}</h3>

           <p class="description">{{$page->description}}</p>
        </div>
    </section>
@endif
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}


