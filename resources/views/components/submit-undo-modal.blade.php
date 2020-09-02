<div class="modal fade" tabindex="-1" role="dialog" id="submitUndoModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-record="{{ HEAD_FIELD_DISPLAY[$view['detail']['title']] }}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure, Do you want to undo the submit??
                <x-submit-undo-form :action="route('broker.view')" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-right" onclick="doUndoSubmit()">UNDO Submit</button>
                <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        let undoId;
        function UndoSubmitRecord(id) {
            $('[name="id"]','#submitUndoModal').val(id);
            $('[name="records"]','#submitUndoModal').val($('#selected_records').serializeArray().map(({ value }) => value).join(','));
            let record = records[id], titleDiv = $('#submitUndoModal .modal-title')
            let title = record[titleDiv.attr('data-record')]; titleDiv.text(title);
            $('#submitUndoModal').modal('show');
        }
        function doUndoSubmit() {
            $('form[name="submit-undo-form"]').submit();
        }
    </script>
@endpush
