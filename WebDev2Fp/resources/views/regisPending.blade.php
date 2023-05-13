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
  }
</style>
@endsection
@section('content')
<div class="toptopsection">
    <div class="testimage">
        <div class="text">
            <p style="font-size: 50px;font-weight: 300;letter-spacing: 5px;color:#e55;">Thank You for Registering!</p>
            <p>Thank you for registering a store with foodies.</p>
            <p>Now we have recived your application to open a store with us, all you have to do now is wait. our mangemnt team will check your request and approve your store</p>
            <p>It should not take more then 4-5 days. if it take longer, Contect out support team to check on your application.</p>
        </div>
    </div>
</div>


@endsection