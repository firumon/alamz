<div class="modal fade" tabindex="-1" role="dialog" id="markUndoModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-record="{{ HEAD_FIELD_DISPLAY[$view['detail']['title']] }}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure, Do you want to undo the action on this record??
                <x-mark-undo-form :action="route('compliance.view')" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-right" onclick="doUndoMark()">UNDO</button>
                <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        let undoId;
        function UndoMarkRecord(id) {
            $('[name="id"]','#markUndoModal').val(id);
            $('[name="records"]','#markUndoModal').val($('#selected_records').serializeArray().map(({ value }) => value).join(','));
            let record = records[id], titleDiv = $('#markUndoModal .modal-title')
            let title = record[titleDiv.attr('data-record')]; titleDiv.text(title);
            $('#markUndoModal').modal('show');
        }
        function doUndoMark() {
            $('form[name="mark-undo-form"]').submit();
        }
    </script>
@endpush
