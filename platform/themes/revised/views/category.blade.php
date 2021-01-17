<div class="row">
    @php
    $image = get_field($category, 'image');
    @endphp
    <div class="cate_top"
        style="background-image: url('{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}');">
        <div class="banner-title">
            <p class="c_name">{{ $category->name }}</p>
            <div class="c_desc">{{ $category->description }}</div>
        </div>
    </div>
</div>
@if ($category->parent_id==0)
{{-- start slider --}}
    <div class="row cate_slder">
        <div class="carousel">
            @foreach ($category->children()->get() as $child_category)
                   <div class="carousel-cell" style="background-image: url({{ RvMedia::getImageUrl(get_field($child_category, 'image'), null, false, RvMedia::getDefaultImage()) }} )">
                       <div class="cell">
                           <div>
                                <div class="centered">{{ $child_category->name }}</div>
                                 <div class="btn_discovery">
                                     <a href="{{ $child_category->url }}" class="btn btn-default subcate_btn discover">
                                         Discover
                                         <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                                     </a>
                                 </div>
                            </div>
                       </div>
                       <div class="mask"></div>
                 </div>
            @endforeach
        </div>
    </div>
{{-- end silder --}}

<div class="row cate_info">
    <div class="row main_content">
        <div class="cinfo col-md-9">
            <p class="cinfo_name">{{ $category->name }}</p>
            <p class="cinfo_desc">{{ $category->description }}</p>
        </div>
        <div class=" col-md-3 cover_download_btn">
            <a class="btn btn-default btn-download" href="#">
                Download Brochure
                <i class="ion ion-ios-cloud-download-outline" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

{{-- sub categories --}}
<div class="row">
    <div class="subcate main_content">
        @foreach ($category->children()->get()->chunk(3) as $chunk)
        <div class="row subcate_row">
            @foreach ($chunk as $child_category)
            <div class="col-md-4">
                <div class="subcate_item"
                    style="background-image:url({{ RvMedia::getImageUrl(get_field($child_category, 'image'), null, false, RvMedia::getDefaultImage()) }})">
                    <div class="subcate_name">{{ $child_category->name }}</div>>
                    <div class="subcate_desc">
                        <p> {{ $child_category->name }} </p>
                        {{ $child_category->description }}
                    </div>
                    <div class="cover_subcate_btn">
                        <a href="{{ $child_category->url }}" class="btn btn-default item_subcate_btn">
                            View All
                            <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="white_bg"></div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
<div class="row relative_cate">
    @php
        $cates = get_featured_categories(3);
        for($i=0; $i<count($cates); $i++) {
            if($cates[$i]->id == $category->id)
                continue;
            $field = \Botble\Blog\Models\Category::find($cates[$i]->id);
            $image = get_field($field, 'image');
            echo '<div class="cate_block col-md-6" style="background-image: url(storage/'.$image.')">
                      <div class="cover_title">
                            <span class="title">'.$cates[$i]->name.'</span>
                            <div class="discover">
                                <a href="'.$cates[$i]->url.'">Discover
                                    <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                                </a>
                            </div>
                      </div>
                </div>';
        }
    @endphp
</div>

@else
{{-- Child category --}}
{{-- highlights --}}
<div class="row">
    <div class="main_content">
    <div class="highlight_title row">Product Highlights</div>

    <div class="row">
        @for($i = 1; $i <= 3; $i++) @php $img=get_field($category, 'highlight_img_' .$i);
            $highlight=get_field($category, 'highlight_' .$i); @endphp
            <div class="highlight_item col-md-4"
            style="background-image: url('{{ RvMedia::getImageUrl($img, null, false, RvMedia::getDefaultImage()) }}');">
                <p class="h_name">{{ $highlight }}</p>
            </div>
        @endfor
    </div>


    {{-- info --}}
    <div class="row chcate_info">
        <div class="row chmain_content">
            <div class="chcinfo col-md-9">
                <p class="chcinfo_name">{{ $category->name }}</p>
                <p class="chcinfo_desc">{{ get_field($category, 'info') }}</p>
            </div>
            <div class=" col-md-3 chcover_download_btn">
                <a class="btn btn-default btn-download" href="#">
                    <span>Request A Sample</span>
                    <img class="" src="{{ RvMedia::getImageUrl('/frame.png', null, false, null) }}" alt="">
                    {{-- <i class="ion ion-ios-pricetags-outline" aria-hidden="true"></i> --}}
                </a>
            </div>
        </div>
    </div>

    {{-- posts --}}
    <div class="row">
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
            <div class="bcover_subcate_btn">
                <a href="#" class="btn btn-default loadmore">
                    Load more
                    <i class="ion ion-ios-arrow-thin-down" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    </div>
    {{-- end post --}}
    <div class="row relative_cate">
    @php
        $cates = get_featured_categories(2);
        for($i=0; $i<count($cates); $i++) {
            $field = \Botble\Blog\Models\Category::find($cates[$i]->id);
            $image = get_field($field, 'image');
            echo '<div class="cate_block col-md-6" style="background-image: url(storage/'.$image.')">
                      <div class="cover_title">
                            <span class="title">'.$cates[$i]->name.'</span>
                            <div class="discover">
                                <a href="'.$cates[$i]->url.'">Discover
                                    <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                                </a>
                            </div>
                      </div>
                </div>';
        }
    @endphp
</div>
</div>
</div>
@endif
