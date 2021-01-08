<section class="main-box">
    <div class="main-box-header">
        {!! Theme::breadcrumb()->render() !!}
    </div>
    <div class="main-box-content">
        <h1 class="article-content-title">
            <i class="fa fa-leaf"></i>
            {{ $page->name }}
        </h1>
        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content, 'youtube'), $page) !!}
    </div>
</section>
