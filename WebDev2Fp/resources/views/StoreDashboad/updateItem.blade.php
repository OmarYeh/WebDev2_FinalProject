@extends('layouts.dashboardStore')
@section('content')
<div class="conatiner" style="margin-left: 30%;margin-top: 5%;">
<div class="allfoods">

<div class="AddFood">
    <form method="post" action="{{Route('updateI',['id'=>$food->id])}}" enctype="multipart/form-data" style="display: flex;flex-direction: column;">
        @csrf
        @method('put')
        <lable for="" style="font-size: 22px;">Name</lable>
        <input type="text" name="name"  value="{{$food->name}}" placeholder="Ex:Pizza"/>
        <lable for="price" style="font-size: 22px;margin-top: 13px;">Price</lable>
        <input type="text" id="price" name="price" value="{{$food->price}}" placeholder="Ex:12$"/>
      
        <div style="display:flex;margin-top: 13px;align-items:center;margin-bottom: 15px;">
        <lable for="platdujour" style="font-size: 22px;">Plat du jour: </lable>
            <input type="checkbox"  id="platdujour"  value="1" name="platdujour" style="margin-top: 8px;margin-left: 14px;" {{ $food->platdujour == 1 ? 'checked' : '' }}/>
        </div>
        <label for="cuisine" style="font-size: 22px;">Cuisine:</label>
        <select name="cuisine">
            <option  value="{{$food->cuisine_id}}">{{$food->getCuisine->name}}</option>
            @foreach($cuisine as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="diet" style="font-size: 22px;margin-top: 10px;">Diet:</label>
        <select name="diet">
            <option  value="{{$food->diet_id}}">{{$food->getDiet->name}}</option>
            @foreach($diet as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="category" style="font-size: 22px;margin-top: 10px;">Category:</label>

        <select name="category">
            <option value="{{$food->category_id}}">{{$food->getCategory->name}}</option>
            @foreach($category as $obj)
            <option value="{{$obj->id}}">{{$obj->name}}</option>
            @endforeach
        </select>
        <label for="imgsrc" style="font-size: 22px;margin-top:10px">Food's Image</label>
        <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" style="margin-bottom: 40px;" />
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

</div>
<script>
$(document).ready(function() {
    
    history.pushState(null, null, '/Store/Dashboard');
  $('.sd').each(function() {
   
    var textWithoutSpaces = $(this).text().replace(/\s+/g, '').toLowerCase();
    console.log(currentPage,textWithoutSpaces)
    if (textWithoutSpaces === 'menu') {
        
      $(this).addClass('clicked');
    }
  });

});
    

    </script>
</div>
@endsection