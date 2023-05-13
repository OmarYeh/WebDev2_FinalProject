@extends('layouts.app')
@section('css')
<style>
    .testimage {
    position: relative; /* Set the position to relative so that the child elements can be positioned relative to it */ 
    overflow: hidden; /* Hide the overflowing content */
    height: 700px;
    z-index: 0;
    display: flex;
    align-items: center;
    flex-direction: column;
    color:white;
    justify-content: center;
  }
  
  .testimage::before {
    
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.9;
    z-index: -1; 
    background-position: center;
    background-image: url('https://images.pexels.com/photos/264636/pexels-photo-264636.jpeg?cs=srgb&dl=pexels-pixabay-264636.jpg&fm=jpg');
    justify-content: center;
  }
  .testimage p{
    text-align: center;
    font-weight: 500; 
    letter-spacing: 0px;
    font-size: 21px;
  }
  .text{
    background:white;
    width:50%;
    color: #5e5c5c;
    max-width: 800px;
    border-radius:15px;
    padding:30px;
    align-items: center;
    display: flex;
    flex-direction: column;
    }
  .custom-loader {
    --d:22px;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    color: rgb(238, 85, 85);
    box-shadow: 
        calc(1*var(--d))      calc(0*var(--d))     0 0,
        calc(0.707*var(--d))  calc(0.707*var(--d)) 0 1px,
        calc(0*var(--d))      calc(1*var(--d))     0 2px,
        calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
        calc(-1*var(--d))     calc(0*var(--d))     0 4px,
        calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
        calc(0*var(--d))      calc(-1*var(--d))    0 6px;
    animation: s7 1s infinite steps(8);
    }

    @keyframes s7 {
    100% {transform: rotate(1turn)}
    }
</style>
@endsection
@section('content')
<div class="toptopsection">
    <div class="testimage">
        <div class="text">
            <p style="font-size: 50px;font-weight: 300;letter-spacing: 5px;color:#e55;margin-bottom:30px;">Waiting for Approval...</p>
            <div class="custom-loader"></div>
            <p style="margin-top: 45px;">The store with name: "{{$store->storeName}}" with an id of: "{{$store->id}}" is still pending for approval from our admins.</p>
            <p>This process should only take about a few days.If it's taking more time, please message our support team to check on the status of the process.</p>
            <p>Thank you for registering with Foodies.</p>
            <p>In the meanwhile , enjoy browsing through Foodies!</p>
            
        </div>
    </div>
</div>


@endsection