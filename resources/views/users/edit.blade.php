@extends('layouts.app')
<!-- This Blade directive  @method('PUT') generates a hidden input field -->
<!-- that Laravel uses to simulate a PUT request.-->
<!-- source: https://laravel.com/docs/12.x/blade#method-field -->
@section('content')
    <div>
        <x-user-form
            title="My Profile"
            :action="route('users.update')"
            method="POST"
            submitText="Update Profile"
            :showAdminCheckbox="false"
            :showCancel="false"
            :user="$user"
        >
            @method('PUT')
        </x-user-form>
    </div>
@endsection
