@extends('layouts.app')

@section('content')
    <h1>Signup</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="" method="POST" class="form">
        @csrf
        <div class="form-element">
            <label for="email">Your email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-element">
            <label for="user_alias">Your user alias</label>
            <input type="text" id="user_alias" name="user_alias" value="{{ old('user_alias') }}">
        </div>

        <div class="form-element">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-element">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <input type="submit" value="Create account">
    </form>
@endsection