<!DOCTYPE html>
<html lang="eng">

<Head>
    <meta charset="utf-8">
    <title> complete Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styleRL.css') }}">
</Head>
<body>
    <form method="POST" action="{{ route('storeSProfile') }}">
        @csrf
       
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