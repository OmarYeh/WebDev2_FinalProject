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
            <div class="sd"><p>Delvery</p></div>
        </div>
        <div class="rigth-Conatiner">
        <div class="conatiner">
            <div class="header-content">
                    <img id="im" src="{{asset($store->imgsrc)}}" width="125px">
                    <div class="tL">
                        <p class="storeTitle">{{$store->storeName}}</p>
                        <p class="storeloc">{{$store->Location}}</p>
                    </div>
            </div>
            <div class="content">
                     <div id="char"style="width:750px;">
                    <canvas id="plays-chart">
                    </div>
                    <div class="topSell">
                      <h1>Top Sellers:</h1>
                        @foreach($store->getFoods  as $key =>  $obj)
                        @if($key < 3 )
                        <div class="food">
                          <div style="padding-top:15px">
                          <img src="{{asset($obj->imgsrc)}}" width="50px" height="50px"/>
                          </div>
                          <div>
                            <p>{{$obj->name}}</p>
                            <p class="price">{{$obj->price}}$</p>
                          </div>
                          <div>
                            <p>Orders:</p>
                            <p class="price">{{$obj->getOrders()->count()}}</p>
                          </div>
                        </div>
                            @else
                            @break
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>
        </div>    
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   
    $(function () {
    
        $('.sd').on('click', function () {
    // Remove the 'clicked' class from the previously selected element
    $('.clicked').removeClass('clicked');

    // Add the 'clicked' class to the currently selected element
    $(this).addClass('clicked');

    var text = $(this).text();
    const url = '/Store/Dashboard/' + text.toString();
    $.ajax({
        url: url,
        type: 'get',
        success: function (result) {
            $('.rigth-Conatiner').html(result);
        }
    });
});
});
var data = [150, 200, 300, 250, 350, 400, 348];
var maxData = Math.max(...data); // find the maximum value in the data array
console.log(maxData);

var ctx = document.getElementById('plays-chart').getContext('2d');
var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets: [{
      label: 'Plays',
      data: data,
      backgroundColor: 'rgb(214, 175, 44)',
      borderColor: 'rgb(214, 175, 44)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        ticks: {
          min: 100,
          max: maxData,
        
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      },
      x: {
        grid: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      }
    },
    
      legend: {
        labels: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      }
    
  }
});
</script>
</html>