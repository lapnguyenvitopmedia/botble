<div class="row">
    
</div>
<div class="row">
    <div class="inner-container">{!! Theme::content() !!}</div>
    <div>
        @if (url()->current() == route('public.single') || ($page && $page->template === 'homepage'))
            <div class="home_content">
                @php
                    $cates = get_featured_categories(3);
                    for($i=0; $i<count($cates); $i++) {
                        $field = \Botble\Blog\Models\Category::find($cates[$i]->id);
                        $image = get_field($field, 'image');
                        echo '<image src="storage/'.$image.'" />';
                    }
                    
                @endphp
            </div>
        @endif
        
    </div>
</div>

