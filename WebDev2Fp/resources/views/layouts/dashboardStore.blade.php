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
  
        input[type="text"]{
            margin-top:10px;
            width:450px;
            height:15px;
            padding:7px;
            outline:none;
            background:none;
            font-family: "Gilroy", "Helvetica", "Arial", "sans-serif";
            font-weight: 500;
            font-size: 16px;
            line-height: 18px;
            border-style: hidden;
            border-radius: 8px;
            border: 1px solid rgb(184, 184, 184);
            cursor: text;
            margin-bottom:10px;
        }
        select{
            width:470px;
            height:35px;
            padding:7px;
            outline:none;
            background:none;
            font-family: "Gilroy", "Helvetica", "Arial", "sans-serif";
            font-weight: 500;
            font-size: 16px;
            line-height: 18px;
            border-style: hidden;
            border-radius: 8px;
            border: 1px solid rgb(184, 184, 184);
            cursor: pointer;
            margin-bottom:10px;
        }

         form input:focus, form select:focus{
    outline:none;
}
label{
    font-size: 17px;
    line-height: 1.42857143;
    margin-bottom:10px;
}
.Allplat::-webkit-scrollbar,.AddFood::-webkit-scrollbar {
  width: 0;
  height: 0;
}
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