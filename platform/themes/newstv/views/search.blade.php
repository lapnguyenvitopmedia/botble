<section class="main-box">
    <div class="main-box-header">
        {!! Theme::breadcrumb()->render() !!}
    </div>
    <div class="main-box-content">
        <h1 class="article-content-title">
            <i class="fa fa-leaf"></i>
            {{ __('Search result for: ') }} "{{ Request::input('q') }}"
        </h1>
        <div class="box-style box-style-3">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="media-news">
                        <a href="{{ $post->url }}" class="media-news-img" title="{{ $post->name }}">
                            <img class="img-full img-bg" src="{{ RvMedia::getImageUrl($post->image, 'medium') }}" style="background-image: url('{{ RvMedia::getImageUrl($post->image) }}');" alt="{{ $post->name }}">
                        </a>
                        <div class="media-news-body">
                            <p class="common-title">
                                <a href="{{ $post->url }}" title="{{ $post->name }}">
                                    {{ $post->name }}
                                </a>
                            </p>
                            <p class="common-date">
                                <time datetime="">{{ $post->created_at->format('M d, Y') }}</time>
                            </p>
                            <div class="common-summary">
                                {{ $post->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <p>{{ __('There is no data to display!') }}</p>
                </div>
            @endif
        </div>
    </div>
</section>

@if ($posts->count() > 0)
    <nav class="pagination-wrap">
        {!! $posts->appends(request()->query())->links() !!}
    </nav>
@endif
