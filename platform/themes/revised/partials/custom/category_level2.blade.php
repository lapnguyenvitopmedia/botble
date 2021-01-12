<div class="category">
    @php
    $image = get_field($category, 'image');
    @endphp
    <div class="cate_top container-fluid"
        style="background-image: url('{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}');">
        <p class="c_name">{{ $category->name }}</p>
        <p class="c_desc">{{ $category->description }}</p>
    </div>

    @if ($category->parent_id==0)
    <div class="cate_slide container-fluid">
        Slide
    </div>
    @else
    <div class="product_highlight container">
        Product Hightlights
    </div>
    @endif

    <div class="cate_info container">
            <div class="cinfo_img">
                <img src="https://via.placeholder.com/327x210" alt="">
            </div>
            <div class="cinfo">
                <p class="cinfo_name">{{ $category->name }}</p>
                <p class="cinfo_desc">{{ $category->description }}</p>
            </div>
            <div class="cinfo_btn">
                <a class="btn btn-default" href="#">
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
    <div class="subcate container">
        @foreach ($category->children()->get()->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $child_category)
            <div class="col-md-4">
                <div class="subcate_item">
                    <img class="card-img-top" width="470"
                        src="{{ RvMedia::getImageUrl(get_field($child_category, 'image'), null, false, RvMedia::getDefaultImage()) }}"
                        alt="{{ $child_category->name }}">
                    <p class="subcate_name">{{ $child_category->name }}</p>
                    <p class="subcate_desc">{{ $child_category->description }}</p>
                    <a href="{{ $child_category->url }}" class="btn btn-default">
                        View All
                        <i class="ion ion-ios-arrow-thin-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <div class="cate_bottom container-fluid">
        Recommend
    </div>
</div>
