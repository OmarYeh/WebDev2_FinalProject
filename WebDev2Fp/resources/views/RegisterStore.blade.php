@extends('layouts.app')
@section('title', 'Register Store')
@section('css')
<link href="{{ asset('css/StoreInput.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="Ricontainer">
    <div class="formRs">
    <form method="post" action="" enctype="multipart/form-data">
        <label for="StoreName">Store Name</label>
        <input type="text" id="StoreName" name="storeName" placeholder="Ex: TempoBeats" />
        <label for="Location">Location</label>
        <input type="text" id="Location" name="Location" placeholder="Downtown , Beirut Lebanon" />
        <label for="Description">Description</label>
        <textarea id="Description" name="Description"></textarea>
        <label for="phone_number">Store Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" placeholder="76688214" />
        <label for="opened">Opened Since</label>
        <input type="text" id="opened" name="opened" placeholder="Ex: 1991" />
    
        <label for="imgsrc">Store's Image</label>
        <input type="file" id="imgsrc" name="imgsrc" placeholder="Enter Image" size="60" />
        <button type="submit" class="buttoninput">Register Store</button>
    </form>
</div>
</div>
@endsection

@section('js')
@endsection