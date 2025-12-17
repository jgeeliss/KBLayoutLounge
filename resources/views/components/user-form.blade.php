@props([
    'title' => 'User Form',
    'action' => '',
    'method' => 'POST',
    'submitText' => 'Submit',
    'showAdminCheckbox' => false,
    'showCancel' => false,
    'cancelRoute' => null,
])

<h1>{{ $title }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ $action }}" method="{{ $method }}" class="form">
    @csrf

    <div class="form-element">
        <label for="email">{{ $showAdminCheckbox ? 'Email' : 'Your email' }}</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" {{ $showAdminCheckbox ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="user_alias">{{ $showAdminCheckbox ? 'User Alias' : 'Your user alias' }}</label>
        <input type="text" id="user_alias" name="user_alias" value="{{ old('user_alias') }}" {{ $showAdminCheckbox ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="birthday">Birthday (optional)</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">
    </div>

    <div class="form-element">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" {{ $showAdminCheckbox ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="password_confirmation">{{ $showAdminCheckbox ? 'Confirm Password' : 'Confirm password' }}</label>
        <input type="password" id="password_confirmation" name="password_confirmation" {{ $showAdminCheckbox ? 'required' : '' }}>
    </div>

    @if ($showAdminCheckbox)
        <div class="form-element">
            <label>
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                Make this user an admin
            </label>
        </div>
    @endif

    @if ($showCancel)
        <div class="form-actions">
            <input type="submit" value="{{ $submitText }}" class="btn btn-primary">
            <a href="{{ $cancelRoute }}" class="btn btn-secondary">Cancel</a>
        </div>
    @else
        <input type="submit" value="{{ $submitText }}">
    @endif
</form>
