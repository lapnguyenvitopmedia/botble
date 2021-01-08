<section class="main-box">
    <div class="main-box-header">
        {!! Theme::breadcrumb()->render() !!}
    </div>
    <div class="main-box-content">
        <h1 class="article-content-title">
            <i class="fa fa-leaf"></i>
            {{ $gallery->name }}
        </h1>
        <p>
            {{ $gallery->description }}
        </p>
        <div id="list-photo">
            @foreach (gallery_meta_data($gallery) as $image)
                @if ($image)
                    <div class="item" data-src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}" data-sub-html="{{ clean(Arr::get($image, 'description')) }}">
                        <div class="photo-item">
                            <div class="thumb">
                                <a href="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}">
                                    <img src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}" alt="{{ clean(Arr::get($image, 'description')) }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <br>
        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
    </div>
</section>
