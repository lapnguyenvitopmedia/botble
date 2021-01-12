<div class="row">

    <div class="footer">
        <div class="footer_info">
            <div class="row">
                <div class="col-md-3 footer_social col">
                    <div class="widget">
                        @if (theme_option('logo_footer') || theme_option('logo'))
                            <div class="footer_logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ RvMedia::getImageUrl(theme_option('logo_footer') ? theme_option('logo_footer') : theme_option('logo')) }}" alt="{{ theme_option('site_title') }}" />
                                </a>
                            </div>
                        @endif
                        <p>{{ theme_option('about-us') }}</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            @if (theme_option('facebook'))
                                <li><a href="{{ theme_option('facebook') }}" class="sc_facebook" target="_blank"><i class="ion-social-facebook"></i></a></li>
                            @endif
                            @if (theme_option('twitter'))
                                <li><a href="{{ theme_option('twitter') }}" class="sc_twitter" target="_blank"><i class="ion-social-twitter"></i></a></li>
                            @endif
                            @if (theme_option('youtube'))
                                <li><a href="{{ theme_option('youtube') }}" class="sc_youtube" target="_blank"><i class="ion-social-youtube-outline"></i></a></li>
                            @endif
                            @if (theme_option('instagram'))
                                <li><a href="{{ theme_option('instagram') }}" class="sc_instagram" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                {!! dynamic_sidebar('footer_sidebar') !!}
            </div>
        </div>

        <div class="footer_text">
            <div>@2020 vinatex international. Designed & Developed by: <strong>Avalon Solution</strong> </div>
        </div>
    </div>

</div>
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    {!! Theme::footer() !!}
</div>
</body></html>


