@php
    SeoHelper::setTitle(__('404 - Not found'));
    Theme::fire('beforeRenderTheme', app(\Botble\Theme\Contracts\Theme::class));
@endphp

{!! Theme::partial('header') !!}

<style>
    .error-page .error-border {
        background-color: var(--color-1st);
        height: .25rem;
        width: 6rem;
        margin-bottom: 1.5rem;
    }

    .error-page a {
        color: var(--color-1st);
    }

    .error-page ul li {
        margin-bottom : 5px;
    }
</style>

<main class="main" id="main">
    <div class="container">
        <div class="main-content">
            <div class="main-left">
                <section class="main-box">
                    <div class="main-box-header">
                        {!! Theme::breadcrumb()->render() !!}
                    </div>
                    <div class="main-box-content error-page">
                        <h1 class="article-content-title">
                            <i class="fa fa-leaf"></i>
                            {{ SeoHelper::getTitle() }}
                        </h1>
                        <div class="error-border"></div>

                        <br>
                        <h4>{{ __('This may have occurred because of several reasons') }}:</h4>
                        <ul>
                            <li>{{ __('The page you requested does not exist.') }}</li>
                            <li>{{ __('The link you clicked is no longer.') }}</li>
                            <li>{{ __('The page may have moved to a new location.') }}</li>
                            <li>{{ __('An error may have occurred.') }}</li>
                            <li>{{ __('You are not authorized to view the requested resource.') }}</li>
                        </ul>

                        <br>
                        <strong>{!! clean(__('Please try again in a few minutes, or alternatively return to the homepage by <a href=":link">clicking here</a>.', ['link' => route('public.single')])) !!}</strong>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

{!! Theme::partial('footer') !!}
