@extends('layouts.app')

@section('content')
    <h1>Create New User</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="form">
        @csrf

        <div class="form-element">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-element">
            <label for="user_alias">User Alias</label>
            <input type="text" id="user_alias" name="user_alias" value="{{ old('user_alias') }}" required>
        </div>

        <div class="form-element">
            <label for="birthday">Birthday (optional)</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">
        </div>

        <div class="form-element">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-element">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-element">
            <label>
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                Make this user an admin
            </label>
        </div>

        <div class="form-actions">
            <input type="submit" value="Create User" class="btn btn-primary">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection