@extends('layouts.app')

@section('content')
<div>
    @php
        $isEditing = isset($keyboard);
        $formAction = $isEditing ? route('keyboards.update', $keyboard) : route('keyboards.store');
        $buttonText = $isEditing ? 'Update Keyboard' : 'Create Keyboard';
        $cancelRoute = $isEditing ? route('keyboards.show', $keyboard) : route('keyboards.index');
    @endphp

    @if($isEditing)
        <h2>Edit Keyboard Layout</h2>
    @endif

    <form action="{{ $formAction }}" method="POST">
        @csrf
        @if($isEditing)
            @method('PUT')
        @endif

        <div>
            <label for="name">
                Keyboard Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $keyboard->name ?? '') }}"
                required
                placeholder="Enter keyboard name">
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea
                name="description"
                id="description"
                rows="5"
                placeholder="Enter keyboard description">{{ old('description', $keyboard->description ?? '') }}</textarea>
        </div>

        <div>
            <label>Keyboard Layout</label>
            @if ($errors->has('layout'))
                <div>
                    {{ $errors->first('layout') }}
                </div>
            @endif
            @php
            $qwertyLayout = [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', ';'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '/']
            ];
            $defaultLayout = $isEditing ? $keyboard->layout : $qwertyLayout;
            $currentLayout = old('layout', $defaultLayout);
            @endphp
            @foreach($currentLayout as $rowIndex => $row)
            <div class="keyboard-row" style="padding-left: {{ $rowIndex * 20 }}px; padding-right: {{ (3-$rowIndex) * 20 }}px;">
                @foreach($row as $colIndex => $currentKey)
                <select name="layout[{{ $rowIndex }}][{{ $colIndex }}]" class="keyboard-key{{ $colIndex == 5 ? ' keyboard-key-spacer' : '' }}">
                    @foreach(array_merge(range('A', 'Z'), ['.', ',', '/', ';', '\'']) as $letter)
                    <option value="{{ $letter }}" {{ $currentKey == $letter ? 'selected' : '' }}>{{ $letter }}</option>
                    @endforeach
                </select>
                @endforeach
            </div>
            @endforeach
        </div>

        <div>
            <button
                type="submit">
                {{ $buttonText }}
            </button>
            <a
                href="{{ $cancelRoute }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection