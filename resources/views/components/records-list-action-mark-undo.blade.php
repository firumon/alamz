@if(strlen($record->{ HEAD_FIELD_DISPLAY['Compliance'] }) !== 0)<button class="btn btn-xs btn-warning" onclick="UndoMarkRecord({{ $record->id }})">Undo</button>@endif
