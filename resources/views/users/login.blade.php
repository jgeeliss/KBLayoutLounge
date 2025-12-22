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

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <label for="remember">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            Remember me
        </label>

        <input type="submit" value="Log in">
    </form>

    <p><a href="{{ route('password.request') }}">Forgot your password?</a></p>
@endsection