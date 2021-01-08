<h2>
    {!! Theme::partial('custom/breadcrumb') !!}
</h2>
<div class="menu">
    {!!
        Menu::renderMenuLocation('main-menu', [ // 
            'options' => [],
            'theme'   => true,
            'view' => 'custom/menu',
        ])
    !!}
</div>
<hr />
<div> {{ theme_option('site_description') }} </div>
<hr />
{{ __('Home') }}
<hr />
{!! apply_filters('language_switcher') !!}
<hr />
    @php
        $page = \Botble\Page\Models\Page::find(1);
        $field = get_field($page, 'new_field');
        echo $field;
    @endphp
<hr />
{!! do_shortcode('[a-shortcode][/a-shortcode]') !!}
<hr />
{!! Theme::content() !!}
