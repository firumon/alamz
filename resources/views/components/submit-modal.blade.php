<div class="modal fade" tabindex="-1" role="dialog" id="submitModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-record="{{ HEAD_FIELD_DISPLAY[$view['detail']['title']] }}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <x-submit-form :action="route('broker.view')" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-right" onclick="doSubmit()">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        let submitId;
        function SubmitRecord(id) {
            $('[name="id"]','#submitModal').val(id);
            $('[name="records"]','#submitModal').val($('#selected_records').serializeArray().map(({ value }) => value).join(','));
            let record = records[id], titleDiv = $('#submitModal .modal-title')
            let title = record[titleDiv.attr('data-record')]; titleDiv.text(title);
            $('#submitModal').modal('show');
        }
        function doSubmit() {
            let validate = true;
            $('[data-mandatory="'+ $('[name="item"]','#submitModal').val() +'"]').each(function(i,E){ if(E.value.trim() === '') validate = false; })
            if(validate) $('form[name="submit-form"]').submit();
            else alert('Please fill mandatory fields');
        }
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('[name="item"]','#submitModal').val(e.target.getAttribute('aria-controls'));
        })
        $('#submitModal').on('show.bs.modal', function (e) {
            $('#submitRecordTab li:first a').tab('show')
        })
    </script>
@endpush
