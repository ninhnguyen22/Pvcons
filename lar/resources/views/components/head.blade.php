<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $head->getTitle() }}</title>
<meta name="description" content="{{ $head->getDescription() }}">
<meta name="keywords" content="{{ $head->getKeywordStr() }}">
<meta http-equiv="content-language" content="vie"/>
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">

<x-head.meta-graph :headMetaGraph="$head->getHeadMetaGraphFactory()" />

<!--  CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-chosen.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.gritter.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-menu.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome/css/all.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontello.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}?v=20211219"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main2.css') }}?v=20211219"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-theme.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/page.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_custom.css') }}?v=20211219"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mightyslider/mightyslider.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mightyslider/mightyslider.animate.css') }}"/>
<!--  CSS -->
<!--  JS -->
<script type="text/javascript" src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-dialog.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.session.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.gritter.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/light.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery_lazyload/lazyload.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/style-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/member.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/product.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/page.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/js_custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mightyslider/tweenlite.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mightyslider/mightyslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mightyslider/mightyslider.animate.plugin.min.js') }}"></script>
<!--  JS -->
<!--  TODO   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107079686-1"></script>-->
<!-- TODO <script>
     window.dataLayer = window.dataLayer || [];
 function gtag() {
     dataLayer.push(arguments)
 };
 gtag('js', new Date());
 gtag('config', 'UA-107079686-1');
 </script>-->
<!--TODO <script type="text/javascript">
    window.fbAsyncInit = function () {
    FB.init({
        appId: "852586548203593",
        cookie: true,  // enable cookies to allow the server to access the session
        xfbml: true,  // parse social plugins on this page
        version: 'v2.8', // use graph api version 2.8
    });
};
// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js') }}";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>-->
