@foreach($users as $user)
<a href="{{Route('editpage',['id'=>$user->id])}}">{{ $user->name }}</a>
<form method="POST" action="{{ Route('deleteUser' ,['id'=> $user->id]) }}" >
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@foreach($user->getRole as $role)
<p>{{$role->name}}</p>
@endforeach
@endforeach