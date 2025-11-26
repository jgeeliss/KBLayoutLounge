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

        <label for="email">Your email</label>
        <input type="email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Log in">
    </form>
@endsection