@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="container">
<h1>Waiting Approval</h1>
<p>The store with name:{{$store->storeName}} of id:{{$store->id}} is still pending for approval from our admins.</p>
<p>This process should only take about few days.If it's taking more time, message our support team to check on the status of the process</p>
<p>Thank you for registering with foodies.</p>
<p>in the meanwhile , ENJOY SRUFFING OUR WEBSITE</p>
</div>
@endsection