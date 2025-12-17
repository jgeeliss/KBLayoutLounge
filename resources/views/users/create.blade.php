@extends('layouts.app')
<!-- note: The colon (:) prefix is Blade syntax for binding a dynamic value to an HTML attribute. -->
<!-- Its shorthand for v-bind:action, which tells Blade to evaluate the expression as JavaScript  -->
<!-- rather than treating it as a plain string. -->
@section('content')
    <x-user-form 
        title="Create New User"
        :action="route('users.store')"
        submitText="Create User"
        :showAdminCheckbox="true"
        :showCancel="true"
        :cancelRoute="route('users.index')"
    />
@endsection