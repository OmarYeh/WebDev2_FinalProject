@extends('layouts.dashboardAdmin')
@section('content')
<div class="conatiner" style="width: 100%; display: flex;flex-direction: column;align-items: center;">
        <p style="text-align:center;margin-top:20px;font-size:40px;font-weight:600;margin-bottom: 62px;">ALL USERS</p>
        <div class="listofusers" style="display:flex; justify-content:center;width:80%;flex-direction:column">
            <div class="title" style="display:flex;align-content:center;width:100%;background: #e55;color: white;">
            <p style="margin-right:50px;margin-left: 3%;font-size:20px">Edit</p>
            <p style="margin-right:50px;margin-left: 4%;font-size:20px">Delete</p>
            <p style="margin-right:50px;margin-left: 9%;font-size:20px">ID</p>
            <p style="margin-right:50px;margin-left: 14%;font-size:20px">Name/User Roles</p>     

            </div>
            <div class="userbox" style="background:#e1e1e1;padding-top: 12px;width: 100%;display:flex;flex-direction:column;overflow-y: scroll;max-height: 400px; ">
                @foreach($users as $user)
                    <div style="display:flex; align-items:center;margin-left: 3%;height: 72px;">
                        <a href="{{Route('editpage',['id'=>$user->id])}}" style="margin-right:50px;"><img src="https://img.icons8.com/ios/50/edit--v1.png"style="width:40px;height:40px;"/></a>
                        <form method="POST" action="{{ Route('deleteUser' ,['id'=> $user->id]) }}" style="margin-left: 4%;" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="height: 40px;width: 40px;border: none;padding:0;cursor: pointer;background: none;"><img src="https://img.icons8.com/ios-glyphs/60/filled-trash.png"style="width:40px;height:40px;"/></button>
                        </form>
                        <p style="margin-left: 16%;">{{$user->id}}</p>
                        <p style="margin-left: 20%;margin-right: 6%;">{{ $user->name }}:</p>
                        @foreach($user->getRole as $role)
                        <p style="margin-right:5px;">{{$role->name}}</p>
                        @endforeach
                        
                    </div>
                @endforeach
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