@if($record->{ HEAD_FIELD_DISPLAY['Status - Broker'] } === 'Submitted')<button class="btn btn-xs btn-warning" onclick="UndoSubmitRecord({{ $record->id }})">Undo</button>@endif
