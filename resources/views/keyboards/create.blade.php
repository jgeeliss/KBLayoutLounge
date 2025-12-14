@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('keyboards.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">
                Keyboard Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
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
                placeholder="Enter keyboard description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Keyboard Layout</label>
            @if ($errors->has('layout'))
                <div class="error-box">
                    {{ $errors->first('layout') }}
                </div>
            @endif
            @php
            $qwertyLayout = [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', ';'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '/']
            ];
            $oldLayout = old('layout', $qwertyLayout);
            @endphp
            @foreach($oldLayout as $rowIndex => $row)
            <div class="keyboard-row" style="padding-left: {{ $rowIndex * 20 }}px; padding-right: {{ (3-$rowIndex) * 20 }}px;">
                @foreach($row as $colIndex => $defaultKey)
                <select name="layout[{{ $rowIndex }}][{{ $colIndex }}]" class="keyboard-key{{ $colIndex == 5 ? ' keyboard-key-spacer' : '' }}">
                    @foreach(array_merge(range('A', 'Z'), ['.', ',', '/', ';', '\'']) as $letter)
                    <option value="{{ $letter }}" {{ $defaultKey == $letter ? 'selected' : '' }}>{{ $letter }}</option>
                    @endforeach
                </select>
                @endforeach
            </div>
            @endforeach
        </div>

        <div>
            <button
                type="submit">
                Create Keyboard
            </button>
            <a
                href="{{ route('keyboards.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection