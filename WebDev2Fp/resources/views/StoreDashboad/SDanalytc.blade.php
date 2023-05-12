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
        </div>