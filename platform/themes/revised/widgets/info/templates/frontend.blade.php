<div class="col-md-4 col">
<div class="aside-box">
    <div class="aside-box-header">
        <h3>{{ $config['name'] }}</h3>
    </div>
    <div class="aside-box-content">
        <p><i class="ion-home"></i> {{ theme_option('address') }}</p>
        <p><i class="ion-ios-telephone"></i> {{ theme_option('hotline') }}</p>
        <p><i class="ion-email"></i><a href="mailto:{{ theme_option('contact_email') }}"> {{ theme_option('contact_email') }}</a></p>
        <p><i class="ion-earth"></i><a href="{{ theme_option('website') }}"> {{ theme_option('website') }}</a></p>
    </div>
</div>
</div>
