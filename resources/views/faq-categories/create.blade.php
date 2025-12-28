@extends('layouts.app')

@section('content')
<div>
    <h2>Create FAQ Category</h2>

    <x-faq-category-form
        :action="route('faq-categories.store')"
        submit-text="Create Category"
        :cancel-route="route('faq-categories.index')"
    />
</div>
@endsection
