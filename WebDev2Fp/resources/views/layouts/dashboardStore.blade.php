<!Doctype html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$store->storeName}}'s Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/recoleta" rel="stylesheet">

    <link href="{{ asset('css/StoreDashboard.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    
        </style>
    </head>

    <body>
    
        <div class="left-nav">
            <div class="sd clicked"><p>Analytic</p></div>
            <div class="sd"><p>Menu</p></div>
            <div class="sd"><p>offers</p></div>
            <div class="sd"><p>Plat de jour</p></div>
            <div class="sd"><p>Orders</p></div>
            <div class="sd"><p>Delivery</p></div>
        </div>
        <div class="rigth-Conatiner" style="width: 80%;">
            @yield('content')
        </div>  
</body>

<script>
   
    $(function () {
    
        $('.sd').on('click', function () {
    // Remove the 'clicked' class from the previously selected element
    $('.clicked').removeClass('clicked');

    // Add the 'clicked' class to the currently selected element
    $(this).addClass('clicked');

    var text = $(this).text().replace(/\s/g, '');
    const url = '/Store/Dashboard/' + text.toString();
    $.ajax({
    url: url,
    type: 'get',
    success: function (result) {
         var $content =  $(result).find('.conatiner');
         $('.rigth-Conatiner').html($content);
    }
});
});
});
</script>

</html>