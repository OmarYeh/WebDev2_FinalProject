@extends('layouts.dashboardAdmin')
@section('content')


<div class="conatiner" style="margin: 0;width: 100%;overflow:hidden">
<p style="text-align:center;margin-top:20px;font-size:40px;font-weight:600;margin-bottom: 62px;">Stores</p>

<div class="allfoods" style="display:flex;margin-top:40px;">
  <div class="Allplat" style="width: 50%;">
  <p style="text-align:center;font-size:30px;font-weight: 500;color: black;">Stores on the Website:</p>

    <div class="fooooood" style="margin-left:40px;overflow-y: scroll;max-height: 500px;">
    @foreach($stores as $store)
        @if($store->status == "approved")
      <div style="display:flex;flex-direction:column;align-items: center;">
        <img src="{{asset($store->imgsrc)}}" style="height: 200px;width:250px; border-radius:9px;"/>
        <div style="display:flex;align-items: center;margin-top: 13px;margin-bottom: 39px;gap: 25px;">    
              <p style="color:black;font-size:25px;font-weight:500;margin-bottom:0;margin-top:0">{{$store->storeName}}</p>
              <p> {{$store->status}} </p>
                <form method="POST" action="{{ Route('deleteStore' ,['id'=> $store->id]) }}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border:none;width:90px;padding:9px;font-size:19px;background-color:#e55;border-radius:9px;cursor:pointer;color:white;">Remove</button>
                </form>
        </div>
        </div>
        @endif
        
   
      @endforeach
    </div>
    </div>
    

    <div class="AddFood" style="margin-left:40px;width: 50%;">
      <p style="text-align:center;font-size:30px;font-weight: 500;color: black;">Stores pending approval:</p>
        <div clas="testttttt" style="overflow-y: scroll;max-height: 500px;">
        @foreach($stores as $store)
            @if($store->status == "pending")
              <div style="display:flex;flex-direction:column;align-items: center;">
              <img src="{{asset($store->imgsrc)}}" style="height: 200px;width:250px;border-radius:9px;" />
              <div style="display:flex;flex-direction:column;align-items: center;margin-top: 13px;margin-bottom: 10px; gap:30px">   
              <p style="color:black;font-size:25px;font-weight:500;margin-bottom:0;margin-top:0">{{$store->storeName}}</p>
              <div style="display:flex; gap:10px; margin-bottom:20px;">
                <form method="POST" action="{{ Route('approve' ,['id'=> $store->id]) }}" >
                        @csrf
                        @method('PATCH')
                        <input type="hidden" value=" {{ $store->id }}" name="id" />
                        <button type="submit" style="border:none;width:90px;padding:9px;font-size:19px;background-color:#e55;border-radius:9px;cursor:pointer;color:white;">Add</button>
                    </form>
                    <form method="POST" action="{{ Route('reject' ,['id'=> $store->id]) }}" >
                        @csrf
                        @method('PATCH')
                        <input type="hidden" value=" {{ $store->id }}" name="id" />
                        <button type="submit" style="border:none;width:90px;padding:9px;font-size:19px;background-color:#e55;border-radius:9px;cursor:pointer;color:white;">Reject</button>
                    </form>
                </div>
                </div>
                </div>
              @endif
              
            
        @endforeach
        </div>
        </div>
        </div>
</div>
      



<script>
$(document).ready(function() {
  var currentPage = window.location.pathname.split('/').pop().toLowerCase();
  $('.sd').each(function() {
   
    var textWithoutSpaces = $(this).text().replace(/\s+/g, '').toLowerCase();
    console.log(currentPage,textWithoutSpaces)
    if (textWithoutSpaces === currentPage) {
      $('.sd').each(function() {
        $(this).removeClass('clicked');
      });
      $(this).addClass('clicked');
    }
  });
});
   

</script>
@endsection
