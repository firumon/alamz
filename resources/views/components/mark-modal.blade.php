<div class="modal fade" tabindex="-1" role="dialog" id="markModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-record="{{ HEAD_FIELD_DISPLAY[$view['detail']['title']] }}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <x-mark-form :action="route('compliance.view')" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-right" onclick="doSubmitStatusForm()">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        function ShowMarkModal(id) {
            let titleDiv = $('.modal-title','#markModal'), title = records[id][titleDiv.attr('data-record')]; titleDiv.text(title);
            $('[name="id"]','#markModal').val(id);
            $('[name="records"]','#markModal').val($('#selected_records').serializeArray().map(({ value }) => value).join(','));
            $('#markModal').modal('show')
        }
        function doSubmitStatusForm() {
            $('form[name="mark-form"]').submit();
        }
    </script>
@endpush
