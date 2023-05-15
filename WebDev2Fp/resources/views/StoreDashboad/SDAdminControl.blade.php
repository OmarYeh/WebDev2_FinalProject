@foreach($stores as $store)
<p> {{$store->status}} </p>
@if( $store->status == "pending")
 <form method="POST" action="{{ Route('approve' ,['id'=> $store->id]) }}" >
    @csrf
    @method('PATCH')
    <input type="hidden" value=" {{ $store->id }}" name="id" />
    <button type="submit">Approve</button>
</form>
<form method="POST" action="{{ Route('reject' ,['id'=> $store->id]) }}" >
    @csrf
    @method('PATCH')
    <input type="hidden" value=" {{ $store->id }}" name="id" />
    <button type="submit">Reject</button>
</form>
@endif
@if( $store->status == "approved")

<form method="POST" action="{{ Route('deleteStore' ,['id'=> $store->id]) }}" >
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

@endif
@endforeach