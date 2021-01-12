@php Theme::set('section-name', $post->name) @endphp

<article class="post post--single">
    <header class="post__header">
        <h3 class="post_title">{{ $post->name }}</h3>
        <div class="post_content">
            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
            <hr />
            {{ $post->description }}
            <hr />
            {{ $post->content }}
            <hr />
            @php
                $general_info = get_field($post, 'general_info');
                $type = get_field($post, 'type');
                $attributes = get_field($post, 'attributes');
                echo $general_info.'<hr />';
                echo $type.'<hr />';
                echo $attributes.'<hr />';
            @endphp
            
        </div>
    </header>
</article>
