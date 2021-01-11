<div class="row">

    <div class="footer">
        <div class="footer_info">
            <div class="row">
                <div class="col-md-3 footer_social col">
                    <div class="social-container">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <i class="fa fa-google-plus-square" aria-hidden="true"></i>
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-md-4 col">scas</div>
                <div class="col-md-2 col">zxc</div>
                <div class="col-md-3 col">qwe</div>
            </div>
        </div>
        <div class="footer_text">
            <div>@2020 vinatex international. Designed & Developed by: <strong>Avalon Solution</strong> </div>
        </div>
    </div>

</div>
    {!! Theme::footer() !!}
</div>
</body></html>


<footer data-background="{{ Theme::asset()->url('images/page-intro-01.png') }}" class="page-footer bg-dark pt-50">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <aside class="widget widget--transparent widget__footer widget__about">
                    <div class="widget__header">
                        <h3 class="widget__title">{{ __('About us') }}</h3>
                    </div>
                    <div class="widget__content">
                        <p>{{ theme_option('site_description') }}</p>
                        <div class="person-detail">
                            <p><i class="ion-home"></i>{{ theme_option('address') }}</p>
                            <p><i class="ion-earth"></i><a href="{{ theme_option('website') }}">{{ theme_option('website') }}</a></p>
                            <p><i class="ion-email"></i><a href="mailto:{{ theme_option('contact_email') }}">{{ theme_option('contact_email') }}</a></p>
                        </div>
                    </div>
                </aside>
            </div>
            {!! dynamic_sidebar('footer_sidebar') !!}
        </div>
    </div>

</footer>
<div id="back2top"><i class="fa fa-angle-up"></i></div>
</div>

<!-- JS Library-->
{!! Theme::footer() !!}



</body>
</html>
