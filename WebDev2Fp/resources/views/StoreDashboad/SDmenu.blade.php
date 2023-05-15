@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner" style="margin: 0;">
<div class="allfoods" style="display: flex;">

<div class="AddFood" style="display:flex; flex-direction:column;padding: 43px;backgorund-color:#fdfdf7;gap:15px;">
    <form method="post" action="{{Route('storeFood',['id'=>$store->getMenu->id])}}" enctype="multipart/form-data" style="display: flex;flex-direction: column;">
        @csrf
        <lable for="">Name</lable>
        <input type="text" name="name" placeholder="Ex:Pizza"/>
        <lable for="price" >Price</lable>
        <input type="text" id="price" name="price" placeholder="Ex:12$"/>
      
        <div style="display:flex;margin-top: 13px;align-items:center;margin-bottom: 15px;">
            <lable for="platdujour" style="font-size: 22px;">Plat du jour: </lable>
            <input type="checkbox"  id="platdujour" value="1" name="platdujour" style="margin-top: 8px;margin-left: 14px;"/>
        </div>
        <label for="cuisine" >Cuisine:</label>
        <select name="cuisine">
            <option value=""></option>
            @foreach($cuisine as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="diet" >Diet:</label>
        <select name="diet">
            <option value=""></option>
            @foreach($diet as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="category" >Category:</label>
        <select name="category" >
            <option value=""></option>
            @foreach($category as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="imgsrc">Food's Image</label>
        <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" style="margin-bottom: 40px;"/>
        <button type="submit" style="border: none;padding: 8px;width: 100%;background: #e55;color: white;font-size: 20px;border-radius: 7px;cursor: pointer;">Add Food</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-dark">
             <ul>           
                 @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach        
            </ul>    
        </div>
    @endif
</div>
<div style="display:flex; flex-direction:column;width: 49%;padding: 43px;">
@foreach($store->getMenu->getFood as $obj)
<div class="itemmm" style="display:flex;margin-bottom: 26px;align-items: center;">
<img src="{{asset($obj->imgsrc)}}" style="width: 100px;height: 100px;"/>
    <p style="font-size:20px;margin-left: 46px;font-weight: 700;">{{$obj->name}}</p>
    @if($obj->getOffer)
    <p style=" font-size:20px;color:red;text-decoration: line-through;margin-right: 30px;">${{$obj->getOffer->oldprice}}</p>
    <p style=" font-size:20px;color:green">${{$obj->price}}</p>
    @else
    <p style="font-size:20px;margin-left:30px">${{$obj->price}}</p>
    @endif
    <a href="{{route('updateItem',['id'=>$obj->id])}}" style="margin-left:40px;margin-right: 20px;"><button style="border: none;padding: 8px;width: 86px;background: #e55;color: white;font-size: 20px;border-radius: 7px;cursor: pointer;">Edit</button></a>
    <form method="post" action="{{route('deleteItem',['id'=>$obj->id])}}">
        @csrf
        @method('delete')
        <button type="submit" style="border: none;padding: 8px;width: 86px;background: #e55;color: white;font-size: 20px;border-radius: 7px;cursor: pointer;">Delete</button>
    </form>
</div>
<hr style="margin:0;margin-bottom: 22px;"/>
@endforeach
</div>
</div>
<script>
$(document).ready(function() {
  var currentPage = window.location.pathname.split('/').pop();
  $('.sd').each(function() {
    if ($(this).data('page') === currentPage) {
      $(this).addClass('clicked');
    }
  });
});
    history.pushState(null, null, '/Store/Dashboard');

    </script>
</div>

@endsection

