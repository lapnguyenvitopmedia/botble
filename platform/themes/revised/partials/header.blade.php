<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="{{ app()->getLocale() }}"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="{{ app()->getLocale() }}"><![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <style>

        </style>

        {!! Theme::header() !!}
        <?php echo Theme::asset()->container('header')->styles(); ?>

        <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
    <body>
        <div class="container">
            <div class="row">
                <div class="topmenu">
                    {!!
                        Menu::renderMenuLocation('header-menu', [
                            'options' => [],
                            'theme'   => true,
                        ])
                    !!}
                </div>
            </div>
            <div class="row ">
                <div class="mainmenu">

                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => [],
                            'theme'   => true
                        ])
                    !!}

                </div>
            </div>
            <div class="row">

                    @if (url()->current() == route('public.single') || ($page && $page->template === 'homepage'))
                        <div class="banner">
                            {{-- {!! do_shortcode('[banner]slaido_96[/banner]') !!} --}}

                        </div>
                    @else
                        <div class="category_image" style="background-image: url({{ theme_option('home_banner') ? RvMedia::getImageUrl(theme_option('home_banner')) : Theme::asset()->url('images/banner.jpg') }})">

                        </div>
                        <div class="slider product">

                        </div>
                    @endif
            </div>
