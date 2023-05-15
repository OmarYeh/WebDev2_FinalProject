<p> {{ $user->name }} </p>
<form method="POST" action="{{ route('editUser', ['id' => $user->id]) }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label for="email">Email:</label>
    <input type="email" name="mail" value="{{ $user->email }}" required>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="">Select gender</option>
        <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
    </select>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <label for="role">Role:</label>
    <select name="role" required>
        <option value="">Select role</option>
        @foreach($allroles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Save</button>
</form>