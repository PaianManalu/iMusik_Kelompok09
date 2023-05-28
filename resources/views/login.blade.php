<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
    @if(session('error'))
    <div>
        {{ session('error') }}
    </div>
    @endif
</form>