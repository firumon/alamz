<div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-record="{{ HEAD_FIELD_DISPLAY[$view['detail']['title']] }}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row py-2">
                    @foreach(\Illuminate\Support\Arr::only(HEAD_FIELD_DISPLAY,$view['detail']['fields']) as $display => $field)
                        <div class="col-4 py-1"><strong>{{ $display }}</strong></div>
                        <div class="col-1 py-1">:</div>
                        <div class="col-7 py-1" data-record="{{ $field }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script type="text/javascript">
        function RecordListDetail(id) {
            let record = records[id];
            $.each(record,function(field,data){ $('[data-record="'+field+'"]').text(data); })
            $('#viewModal').modal('show')
        }
    </script>
@endpush
