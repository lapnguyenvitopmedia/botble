
    @php
        $page = Theme::get('page');
    @endphp
    @if (url()->current() == route('public.single') || ($page && $page->template === 'homepage'))
        <div class="row">
        <div class="home_content">
            <div class="main_title">{{ __('Lastest Collections') }} <a><i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i></a> </div>
            <div class="home_collection">
                <ul>
                    @php
                        $cates = get_featured_categories(3);
                        for($i=0; $i<count($cates); $i++) {
                            $field = \Botble\Blog\Models\Category::find($cates[$i]->id);
                            $image = get_field($field, 'image');
                            $logo = get_field($field, 'logo');
                            echo '<li>
                                    <div class="cate_block"  style="background-image: url(storage/'.$image.')">
                                        <div class="title">
                                            '.$cates[$i]->name.'
                                        </div>
                                        <div class="cover_title">
                                            <div class="discover">
                                                <a href="'.$cates[$i]->url.'">Discover
                                                    <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>';
                                        if($logo) {
                                            echo '<img class="cate_logo" src="storage/logo-sinnika-small.png" />';
                                        }
                                      echo '
                                      </div>
                                </li>';
                        }
                    @endphp
                </ul>
            </div>
        </div>
            </div>
    @else
        {!! Theme::content() !!}
    @endif


