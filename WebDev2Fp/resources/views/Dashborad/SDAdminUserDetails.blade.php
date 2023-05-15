<head>
<link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
<style>
    body{
        font-family: Satoshi;
    }
</style>
</head>
<body style="margin:0">
<div style="width:100%;height:100%;display:flex;justify-content:center;align-items:center;background: #e55;">
    <div style="background:white;width: 35%;height: 75%;border-radius: 5px;">
            <p style="padding:0;margin:0;text-align:center;font-size:30px;margin-top:40px;font-weight: 600;">{{$user->id}} - {{ $user->name }} </p>
            <div class="userinfo" style="display:flex;flex-direction:column;align-items: center;">
            <form method="POST" action="{{ route('editUser', ['id' => $user->id]) }}" style="margin-top: 21px;display:flex;flex-direction:column;width:50%"> 
                @csrf
                @method('PUT')

                <label for="name" style="margin-bottom:5px;font-size:20px;">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" required style="margin-bottom: 15px;height: 35px;border: none;background: #ebebef;border-radius: 6px;padding: 7px;">

                <label for="email" style="margin-bottom:5px;font-size:20px;">Email:</label>
                <input type="email" name="mail" value="{{ $user->email }}" required style="margin-bottom: 15px;height: 35px;border: none;background: #ebebef;border-radius: 6px;padding: 7px;">

                <label for="gender" style="margin-bottom:5px;font-size:20px;">Gender:</label>
                <select name="gender" required style="margin-bottom: 15px;height: 35px;border: none;background: #ebebef;border-radius: 6px;padding: 7px;">
                    <option value="">Select gender</option>
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                </select>

                <label for="password" style="margin-bottom:5px;font-size:20px;">Password:</label>
                <input type="password" name="password" required style="margin-bottom: 15px;height: 35px;border: none;background: #ebebef;border-radius: 6px;padding: 7px;">

                <label for="role" style="margin-bottom:5px;font-size:20px;">Role:</label>
                <select name="role" required style="margin-bottom: 15px;height: 35px;border: none;background: #ebebef;border-radius: 6px;padding: 7px;">
                    <option value="">Select role</option>
                    @foreach($allroles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <button type="submit" style="height: 43px;border: none;background: #e55;border-radius: 6px;padding: 7px;color: white;font-size: 19px;font-weight: 600;font-family: Satoshi;">Save</button>
            </form>
            </div>
    </div>
</div>

</body>