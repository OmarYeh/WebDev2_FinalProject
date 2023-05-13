@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner">
            <div class="header-content">
                    <img id="im" src="{{asset($store->logo)}}" width="125px">
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
                        @foreach($menu->getFood  as $key =>  $obj)
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
            <script>
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
        </div>
        @endsection