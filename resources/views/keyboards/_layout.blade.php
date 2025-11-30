@if($keyboard->layout)
<div style="margin-top: 10px;">
    <div style="display: inline-block; padding: 10px; border-radius: 5px; font-family: monospace;">
        @foreach($keyboard->layout as $rowIndex => $row)
        <div style="display: flex; gap: 4px; margin-bottom: 4px; padding-left: {{ $rowIndex * 15 }}px; padding-right: {{ (3-$rowIndex) * 15 }}px;">
            @foreach($row as $key)
            <div style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; background: {{ empty($key) ? 'gray' : 'white' }}; border: 1px solid #ccc; border-radius: 3px; font-weight: bold; color: #222222; {{ $loop->index == 5 ? 'margin-left: 15px;' : '' }}">
                {{ $key }}
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endif
