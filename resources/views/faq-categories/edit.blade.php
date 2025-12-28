@extends('layouts.app')

@section('content')
<div>
    <h2>Edit FAQ Category</h2>

    <x-faq-category-form
        :action="route('faq-categories.update', $faqCategory)"
        method="PUT"
        :faq-category="$faqCategory"
        submit-text="Update Category"
        :cancel-route="route('faq-categories.index')"
    />
</div>
@endsection
