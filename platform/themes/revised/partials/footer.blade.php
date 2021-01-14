<div class="row">
    <div class="footer">
        <div class="main_content pos_relative">
            <span class="btn_scrollup">
                
            </span>
        </div>
        <div class="footer_info">
            <div class="row">
                <div class="col-md-4 footer_social col">
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
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a href="#"><i class="fa fa-youtube-play fa-lg"></i></a>
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


