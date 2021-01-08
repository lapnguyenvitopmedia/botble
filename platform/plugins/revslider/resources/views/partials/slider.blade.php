@if (is_plugin_active('revslider'))
<html>
<head>
    <!-- update the path to the "revslider-standalone" folder for your site for the files below -->
    <link rel="stylesheet" type="text/css" media="all"
        href="/revslider-standalone/revslider/public/assets/css/settings.css" />
    <script type="text/javascript" src="/revslider-standalone/assets/js/includes/jquery/jquery.js"></script>
    <script type="text/javascript"
        src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript"
        src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/revslider-standalone/assets/js/revslider.js" id="revslider_script"></script>
</head>
<body>
    <!-- change "example" in the code below to match your slider's alias -->
    {{-- <div class="revslider" data-alias="image-hero5"></div> --}}
    <div class="revslider" data-alias="{{ $alias }}"></div>
</body>
</html>
@endif
