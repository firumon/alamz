@php $view = $view ?? config("alramz.views.$role.$page"); extract(records($view['paginate'],$view['conditions'],$gScope ?? true)); @endphp
@component('components.detail-modal',['view' => $view, 'records' => $records]) @endcomponent
@includeWhen($role === 'broker','components.submit-modal',['view' => $view, 'records' => $records])
@includeWhen($role === 'broker','components.submit-undo-modal',['view' => $view, 'records' => $records])
@includeWhen($role === 'compliance','components.mark-modal',['view' => $view, 'records' => $records])
@includeWhen($role === 'compliance','components.mark-undo-modal',['view' => $view, 'records' => $records])
@if(session()->has('success')) <div class="alert alert-success"> Record Status Updated Accordingly !</div> @endif
@component('components.records-list',['view' => $view, 'records' => $records, 'links' => $links, 'search' => $search ?? true]) @endcomponent
@push('js')
    <script type="text/javascript">
        const records = @json(collect($records->items())->keyBy->id);
    </script>
@endpush
