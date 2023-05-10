<!DOCTYPE html>
<html lang="eng">

<Head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styleRL.css') }}">
</Head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input  type="text" name="name" placeholder="ex: Hussein Hammour, Hares Saade" value="{{old('name')}}" />
                @if ($errors->has('name'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                 </span>
                @endif
                <input class="email" type="email" name="email" placeholder="Email" value="{{old('email')}}"/>
                @if ($errors->has('email'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                 </span>
                @endif  
                <input  type="password" name="password" placeholder="Password" />
                @if ($errors->has('password'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
                <input name="password_confirmation" class="cpass" type="password" placeholder="Confirm Password" />
                @if ($errors->has('password_confirmation'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                 </span>
                 @endif

                 <input type="date" id="birthday" name="birthday" value="{{old('birthday')}}">
                @if ($errors->has('birthday'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('birthday') }}</strong>
                 </span>
                @endif

                <input type="radio" id="Male" name="gender" value="Male">
                      <label for="Male">Male</label>
                      <input type="radio" id="Female" name="gender" value="Female">
                      <label for="Female">Female</label>
                      <input type="radio" id="PreferN" name="gender" value="null">
                      <label for="PreferN">Perfer not</label>

                    @if ($errors->has('gender'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('gender') }}</strong>
                 </span>
                @endif

                <input type="text" name="phonenumber" value="{{old('phonenumber')}}">
                @if($errors->has('phonenumber'))
                <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('phonenumber') }}</strong>
                 </span>
                @endif

                <button type="submit">Register</button>
    </form>
</body>
</html>