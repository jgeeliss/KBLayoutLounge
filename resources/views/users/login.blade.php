@extends('layouts.app')

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="" method="POST">
        @csrf

        <label for="user_alias">Your user alias</label>
        <input type="text" id="user_alias" name="user_alias" value="{{ old('user_alias') }}">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <label for="remember">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            Remember me
        </label>

        <input type="submit" value="Log in">
    </form>
@endsection