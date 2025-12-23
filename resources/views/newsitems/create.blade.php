@extends('layouts.app')

@section('content')
<div>
    <h2>Create News Item</h2>

    <x-newsitem-form
        :action="route('newsitems.store')"
        submit-text="Create News Item"
        :cancel-route="route('newsitems.index')"
    />
</div>
@endsection
