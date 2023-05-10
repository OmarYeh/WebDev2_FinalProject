@extends('layouts.app')
@section('title','Home')

@section('content')



    <div class="homeimage">
        <div class="imagebox">
            <p class="titleimagebox">Your food delivered in a fingertip.</p>
            <p class="textimagebox">From our local chefs right to your doorstep all within a day.</p>
            <form class="searchbox">
                <svg class="sc-fXoxut sc-ftEBqf bLSmTI fjClFW" aria-hidden="true" focusable="false" data-prefix="far"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" x="0px" y="0px" width="50" height="50"><path fill="currentColor" d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z" style="overflow: visible;box-sizing: content-box;"></path></svg>
                <input class="input" type="text" placeholder="Search for your product" value="">
                <button class="buttoninput" >Find Food</button>
            </form>
        </div>
    </div>
    <div class="cuisinecat">
        <div class="searchicon">
            <img src="https://img.icons8.com/bubbles/100/null/search.png" style="width: 90px;height: 90px;margin-top: 54px;"/>
        </div>
        <p style="font-size: 26px;margin-bottom: 38px;margin-top: 8px;font-weight: 700;color: rgb(56, 56, 56);">Choose your cuisine of choice.</p>
        <div class="buttonrow">
            @foreach($cuisine as $obj)
                <a  href="{{Route('cuisine',['id'=>$obj->id])}}"class="buttonforcat">
                    <p style="margin-bottom: 0;">{{$obj->name}}</p>
                </a>
            @endforeach

            <button class="buttonforcat">
                <p style="margin-bottom: 0;">Mediterannian</p>
            </button>
            <button class="buttonforcat">
                <p style="margin-bottom: 0;">British</p>
            </button>
            <button class="buttonforcat">
                <p style="margin-bottom: 0;">Italian</p>
            </button>
            <button class="buttonforcat">
                <p style="margin-bottom: 0;">Japanese</p>
            </button>
            <button class="buttonforcat">
                <p style="margin-bottom: 0;">German</p>
            </button>
            <button class="buttonforcat">
                <p style="margin-bottom: 0;">Greek</p>
            </button>

        </div>
    </div>
    <div class="productshowcard">
        <div class="searchicon">
            <img src="https://img.icons8.com/bubbles/100/null/star.png" style="width: 90px;height: 90px;"/>
        </div>
        <p style="font-size: 26px;margin-bottom: 45px;margin-top: 8px;font-weight: 700;color: rgb(56, 56, 56);">Top Dishes of the Day.</p>
        <div style="display: flex;overflow-x: hidden;">
            <button class="left-button">&#8249;</button>
            <div class="dishesrow">
                @foreach($food as $obj)
               
                    <div class="imagedish">
                        <a href="{{Route('food',['id'=>$obj->id])}}" style="color: black;font-weight: 400;">
                            <img class="imagedishimg" src="{{asset($obj->imgsrc)}}" style="width:300px; height:250px; border-radius: 18px;margin-left: 0px;" />
                            <div class="productinfo">
                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 27px;">{{$obj->name}}</p>
                                {{$obj->getMenu->getstore->storeName}}
                                <p style="font-size: 24px;">${{$obj->price}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="imagedish">
                    
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="productinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Pancakes</p>
                            <p>$50</p>
                        </div>
                    </a>
                </div>

            </div>
        <button class="right-button">&#8250;</button>
        </div>
    </div>

    <div class="advert">
            <div class="imageadvert">
                <img src="https://assets.bonappetit.com/photos/61f431cd3c17d5f529cd9042/3:2/w_2499,h_1666,c_limit/20220118%20Lunar%20New%20Year%20Spread%20LEDE.jpg" style="width: 700px;height: 500px;border-radius: 61px;margin-left: 56px;"/>
            </div>
        <div class="advertttext">
            <p style="font-size: 50px;font-weight: 600;margin-top: 125px;">The Food Of The Present.</p>
            <p style="font-size: 29px; font-weight: 300;">With us you will grow further and bigger as a human. we will make sure to provide you with the best service possible and with the highest quality of food.</p>
        </div>
    </div>

    <div class="productshowcard" style="margin-top:150px;">
        <div class="searchicon">
            <img src="https://img.icons8.com/bubbles/100/null/shop.png" style="width: 90px;height: 90px;"/>
        </div>
        <p style="font-size: 26px;margin-bottom: 45px;margin-top: 8px;font-weight: 700;color: rgb(56, 56, 56);">Shops Around You.</p>
        <div style="display: flex;overflow-x: hidden;">
            <button class="left-button2">&#8249;</button>
            <div class="dishesrow2">
                @foreach($store as $obj)
                    <div class="imagedish">
                        <a href="{{Route('store',['id'=>$obj->id])}}" style="text-decoration: none;color: black;font-weight: 400;">
                            <img class="imagedishimg"src="{{asset($obj->imgsrc)}}" style="width:300px; height:250px; border-radius: 18px;margin-left: 0px;" />
                            <div class="storeinfo">
                                <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 27px;">{{$obj->storeName}}</p>

                                <p style="font-size: 20px;">{{$obj->Location}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div>
                <div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div><div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div><div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div><div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div><div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div><div class="imagedish">
                    <a >
                        <img class="imagedishimg"src="https://media.istockphoto.com/id/1271897466/photo/empty-restaurant.jpg?s=170667a&w=0&k=20&c=TF-QkbZZ078d6DEZYqHPhX1opIy9I_QTiFplT7-E0H0=" style="width:300px; height:250px; border-radius: 18px;margin-left: 8px;" />
                        <div class="storeinfo">
                            <p style="font-weight: 700;color: rgb(56, 56, 56);font-size: 23px;">Abo Ali</p>
                            <p>4.5 Stars</p>
                            <p style="font-size: 15px;">Beirut, Lebanon</p>
                        </div>
                    </a>
                </div>

            </div>
            <button class="right-button2">&#8250;</button>
        </div>
    </div>

    <div class="advert" style="gap: 50px;margin-left: 58px; margin-bottom:100px;">

        <div class="advertttext">
            <p style="font-size: 50px;font-weight: 600;margin-top: 125px;text-align: end;">Community. Equality. Strength.</p>
            <p style="font-size: 29px; font-weight: 300;text-align: end;">Here at Foodies, we believe in treating all our customers and shops equally and providing underprivleged chefs the opportunity to grow and prosper. We will make sure to uphold our beliefs and enforce justice.</p>
        </div>
        <div class="imageadvert">
            <img src="https://pikwizard.com/pw/medium/ea8f83fd47d0ad494c10936ca0fcaa90.jpg" style="width: 700px;height: 500px;border-radius: 61px;margin-left: 56px;"/>
        </div>
    </div>

@endsection

