<div class="row mb-2">
    <div class="col-4">@if(isset($search) && $search !== false) @component('search') @endcomponent @endif</div>
    <div class="ml-auto">{!! $links !!}</div>
</div>
@php $bulk = $view['actions'] && !empty($view['actions']) && (in_array('submit',$view['actions']) || in_array('mark',$view['actions']) || in_array('undo',$view['actions'])) @endphp
<div class="table-responsive"><form id="selected_records" onsubmit="return false;">
    <table class="table table-sm" id="records-list-table">
        <thead><tr> @if($bulk) <td><input type="checkbox" onchange="selectAll(this.checked)"></td> @endif @foreach($view['fields'] as $th)<th> {{ $th }} </th>@endforeach <th>&nbsp;</th></tr></thead>
        <tbody>
        @forelse($records as $record)
            <tr> @if($bulk) <td><input type="checkbox" name="records[]" value="{{ $record->id }}"></td> @endif
                @foreach($view['fields'] as $td) <td>{{ $record->{ HEAD_FIELD_DISPLAY[$td] } }}</td> @endforeach
                <td>
                    @forelse($view['actions'] as $action)
                        @component('components.records-list-action-' . $action,['record' => $record]) @endcomponent
                    @empty
                        &nbsp;
                    @endforelse
                </td>
            </tr>
        @empty
            <tr><td colspan="{{ count($view['fields']) }}">No records</td><td>&nbsp;</td></tr>
        @endforelse
        </tbody>
    </table>
    </form></div>
@push('js')
    <script>
        $(function() {
            $("#records-list-table").tablesorter();
        });
        function  selectAll(status){
            $("[name^=records]").prop('checked',!!status)
        }
    </script>
@endpush
