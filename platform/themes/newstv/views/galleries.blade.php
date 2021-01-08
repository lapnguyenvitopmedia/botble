<section class="main-box">
    <div class="main-box-header">
        {!! Theme::breadcrumb()->render() !!}
    </div>
    <div class="main-box-content">
        <h1 class="article-content-title">
            <i class="fa fa-leaf"></i>
            {{ __('Galleries') }}
        </h1>
        @if (isset($galleries) && !$galleries->isEmpty())
            <div class="gallery-wrap">
                @foreach ($galleries as $gallery)
                    <div class="gallery-item">
                        <div class="img-wrap">
                            <a href="{{ $gallery->url }}"><img src="{{ RvMedia::getImageUrl($gallery->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $gallery->name }}"></a>
                        </div>
                        <div class="gallery-detail">
                            <div class="gallery-title"><a href="{{ $gallery->url }}">{{ $gallery->name }}</a></div>
                            <div class="gallery-author">{{ __('By') }} {{ $gallery->user->getFullName() }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    </section>
