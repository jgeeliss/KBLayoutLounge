@extends('layouts.app')

@section('content')
<div>
    <h2>Edit News Item</h2>

    <x-newsitem-form
        :action="route('newsitems.update', $newsitem)"
        method="PUT"
        :newsitem="$newsitem"
        submit-text="Update News Item"
        :cancel-route="route('newsitems.show', $newsitem)"
    />
</div>
@endsection
