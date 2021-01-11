<div class="row">

</div>
<div class="row">
    <div class="inner-container">{!! Theme::content() !!}</div>
    <div>
        @if (url()->current() == route('public.single') || ($page && $page->template === 'homepage'))
            <div class="home_content">
                <div class="main_title">{{ __('Lastest Collections') }} <a><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
                <div class="home_collection">
                    <ul>
                        @php
                            $cates = get_featured_categories(3);
                            for($i=0; $i<count($cates); $i++) {
                                $field = \Botble\Blog\Models\Category::find($cates[$i]->id);
                                $image = get_field($field, 'image');
                                echo '<li>
                                        <div class="cate_block"  style="background-image: url(storage/'.$image.')">
                                            <div class="cover_title">
                                                <span class="title">'.$cates[$i]->name.'</span>
                                                <div class="discover">
                                                    <a href="'.$cates[$i]->url.'">Discover
                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                    </a>

                                                </span>
                                            </div>
                                          </div>
                                    </li>';
                            }
                        @endphp
                    </ul>
                </div>
            </div>
        @endif

    </div>
</div>

