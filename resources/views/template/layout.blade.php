<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
    <title>Kadai Sembako</title>

    <link href="{{ asset('asset-front/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-front/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-front/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-front/css/jquery.simpleLens.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-front/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset-front/css/nouislider.css') }}">
    <link id="switcher" href="{{ asset('asset-front/css/theme-color/green-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('asset-front/css/style.css') }}" rel="stylesheet">    

    <link href='{{ asset('asset-front/css/lato.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('asset-front/css/raleway.css') }}' rel='stylesheet' type='text/css'>

  </head>
  <body>
  
    {{-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> --}}

    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>

    @include('template.partials.header')

    @include('template.partials.menu')

    @yield('content')
      
    @include('template.partials.footer')

    <script src="{{ asset('asset-front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset-front/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/jquery.smartmenus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/jquery.simpleLens.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset-front/js/nouislider.js') }}"></script>
    <script src="{{ asset('asset-front/js/custom.js') }}"></script>   

  </body>
</html>