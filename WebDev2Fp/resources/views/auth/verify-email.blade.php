<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Email verification</title>
    <style>
        *{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
        }
        body{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            background-color:#fdfdf7;
            
        }

        .container{
            color:rgb(56, 56, 56);
            margin-top:250px;
            display:flex;
            background-color:white;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            width:450px;
            padding:15px;
            border-radius:15px;
            box-shadow: -2px 5px 8px #121212;
        }
        .container p{
            color:rgb(56, 56, 56);
        }
        .logo{
        width: 125px;
        object-fit:contain;
        margin:10px 0;
    }
        .circle{
            display:flex;
            justify-content:center;
            align-items:center;
            width:75px;
            height: 75px;
            border:10px solid #22d710;
            border-radius:50%;
            font-size:34px;
        }
        .msg{
            text-align:center;
        }
        .msg p{
            color:rgb(56, 56, 56);

        }
        .msg2con {
            display:flex;
            flex-direction:row;
            justify-content:baseline;
            align-items:center;
        }
        .msg2con button{
            color:white;
            margin-left:5px;
            width:170px;
            height:30px;
            padding:0px;
            background:#e55;
            outline:none;
            border:none;
            border-radius:7px;

        }
        </style>
</head>
<body>
<div class="container">
    @if(empty(Auth::user()->email_verified_at))
    
<div class="msg">
<img class="logo" src="{{ asset('storage/images/foodies.png') }}" />
        <p>Thanks for signing up!</p>
        <p> Please, verify your email address by clicking on the link we just emailed to you.
            
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="msg2con">
            <p> Didn't receive the email? Click here to</p>
                <button type="submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>
        </div>
    @else
        
        
        <div class="circle">
        <span><i class="fas fa-check" style="color:#22d710;"></i></span>
        </div>
        <p>You're Email has been Verified!!</p>
        @endif
       
   
    </div>
</body>
</html>