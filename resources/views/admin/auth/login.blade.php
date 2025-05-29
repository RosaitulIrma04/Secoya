<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email Admin">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
