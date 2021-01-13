@if ($category->parent_id==0)
<div class="row">
    @php
        $image = get_field($category, 'image');
    @endphp
    <div class="cate_top" style="background-image: url('{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}');">
        <div class="banner-title">
            <p class="c_name">{{ $category->name }}</p>
            <div class="c_desc">{{ $category->description }}</div>
        </div>
    </div>
{{-- start slider --}}
<br>
    <div class="row cate_slder">
        <div class="carousel">
            @foreach ($category->children()->get() as $child_category)
                   <div class="carousel-cell" style="background-image: url({{ RvMedia::getImageUrl(get_field($child_category, 'image'), null, false, RvMedia::getDefaultImage()) }} )"> 
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
            @endforeach
        </div>
    </div>
    <br>
{{-- end silder --}}

<div class="row cate_info">
    <div class="row main_content">
        <div class="cinfo col-md-9">
            <p class="cinfo_name">{{ $category->name }}</p>
            <p class="cinfo_desc">{{ $category->description }}</p>
        </div>
        <div class=" col-md-3 cover_download_btn">
            <a class="btn btn-default btn-download" href="#">
                @if ($category->parent_id==0)
                Download Brochure
                <i class="ion ion-ios-cloud-download-outline" aria-hidden="true"></i>
                @else
                Request A Sample
                <i class="ion ion-ios-cloud-download-outline" aria-hidden="true"></i>
                @endif
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
                <div class="subcate_item" style="background-image:url({{ RvMedia::getImageUrl(get_field($child_category, 'image'), null, false, RvMedia::getDefaultImage()) }})">
                    <div class="subcate_name">{{ $child_category->name }}</div>>
                    <div class="subcate_desc">
                        <p> {{ $child_category->name }} </p>
                        {{ $child_category->description }}
                    </div>
                    <div class="cover_subcate_btn">
                        <a href="{{ $child_category->url }}" class="btn btn-default subcate_btn">
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





@endif
