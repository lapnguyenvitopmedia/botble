<section class="main-box">

    <div class="row">

        <div class="cate_top"
            style="background-image: url('{{ RvMedia::getImageUrl('/galleries/image-77.jpg', null, false, RvMedia::getDefaultImage()) }}');">
            <div class="banner-title">
                <p class="c_name">Seach</p>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="row cate_info">
                <div class="row main_content">
                    <div class="cinfo col-md-12" style="height: 220px;">
                        <p class="cinfo_name">
                            <h1 class="article-content-title">
                                {{-- <i class="fa fa-leaf"></i> --}}
                                {{ __('Search result for: ') }} "{{ Request::input('q') }}"
                            </h1>
                        </p>

                    </div>

                </div>
            </div>
            <div class="subcate main_content">
                {{-- @php
                    dd($posts)
                @endphp --}}
                @foreach ($posts->chunk(2) as $chunk)
                <div class="row subcate_row">
                    @foreach ($chunk as $post)
                    <div class="col-md-6">
                        <div class="subcate_item_big"
                            style="background-image:url({{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }})">
                            <div class="subcate_name">
                                    <div class="div_bigger">
                                        <p class="tile_big">{{ $post->name }}</p>
                                        <p class="text_big">{{ $post->description }}</p>
                                    </div>
                                    <div class="div_big">
                                        <img class="img_big" src="{{ RvMedia::getImageUrl(get_field($post, 'post_logo'), null, false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                        @if (get_field($post, 'is_repreve')==1)
                                            <p class="p_big">Repreve</p>
                                        @endif
                                        <div class="cover_subcate_btn">
                                            <a href="{{ $post->url }}" class="subcate_btn">
                                                <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>

        </div>
    </div>
</section>

@if ($posts->count() > 0)
    <nav class="pagination-wrap">
        {!! $posts->appends(request()->query())->links() !!}
    </nav>
@endif
