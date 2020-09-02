@unless($record->{ HEAD_FIELD_DISPLAY['Status - Compliance'] })
    <button class="btn btn-xs btn-info" onclick="ShowMarkModal({{ $record->id }})">Action</button>
@endunless
