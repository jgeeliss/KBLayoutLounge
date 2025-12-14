@if($keyboard->layout)
<div class="layout-container">
    <div class="layout-wrapper">
        @foreach($keyboard->layout as $rowIndex => $row)
        <div class="layout-row" style="padding-left: {{ $rowIndex * 15 }}px; padding-right: {{ (3-$rowIndex) * 15 }}px;">
            @foreach($row as $key)
            <div class="layout-key{{ empty($key) ? ' layout-key-empty' : '' }}{{ $loop->index == 5 ? ' layout-key-spacer' : '' }}">
                {{ $key }}
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endif
