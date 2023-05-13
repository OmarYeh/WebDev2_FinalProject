@extends('layouts.dashboardStore')
@section('content')
    <div class="conatiner">
<div class="allfoods">
<p>{{ $store->storeName }}</p>

<div class="AddFood">
    <form method="post" action="{{Route('storeFood',['id'=>$store->getMenu->id])}}" enctype="multipart/form-data">
        @csrf
        <lable for="">Name</lable>
        <input type="text" name="name" placeholder="Ex:Pizza"/>
        <lable for="price"></lable>
        <input type="text" id="price" name="price" placeholder="Ex:12$"/>
      
        
        <lable for="platdujour">plat du jour</lable>
        <input type="checkbox"  id="platdujour" value="1" name="platdujour" />
        <select name="cuisine">
            <option value=""></option>
            @foreach($cuisine as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <select name="diet">
            <option value=""></option>
            @foreach($diet as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <select name="category">
            <option value=""></option>
            @foreach($category as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="imgsrc">Food's Image</label>
        <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" />
        <button type="submit">Add Food</button>
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
@foreach($store->getMenu->getFood as $obj)
<img src="{{asset($obj->imgsrc)}}"/>
    <p>{{$obj}}</p>
    <a href="{{route('updateItem',['id'=>$obj->id])}}">update</a>
    <form method="post" action="{{route('deleteItem',['id'=>$obj->id])}}">
        @csrf
        @method('delete')
        <button type="submit">delete</button>
    </form>
@endforeach
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

