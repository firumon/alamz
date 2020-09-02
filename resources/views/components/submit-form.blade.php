<form method="post" action="{{ $action }}" name="submit-form" enctype="multipart/form-data">@csrf
    <input type="hidden" name="action" value="submit">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="item" value="">
    <input type="hidden" name="records" value="">

    <ul class="nav nav-tabs" id="submitRecordTab" role="tablist">
        @foreach(config('alramz.submit') as $Title => $Options) @php $kebab = \Illuminate\Support\Str::kebab($Title) @endphp
            <li class="nav-item {{ $loop->index ? '' : 'active' }}"><a class="nav-link" id="{{ $kebab }}-tab" data-toggle="tab" href="#{{ $kebab }}" role="tab" aria-controls="{{ $Title }}" aria-selected="true">{{ $Title }}</a></li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach(config('alramz.submit') as $Title => $Options) @php $kebab = \Illuminate\Support\Str::kebab($Title) @endphp
        <div class="tab-pane py-4 {{ $loop->index ? '' : 'show active' }}" id="{{ $kebab }}" role="tabpanel" aria-labelledby="{{ $kebab }}-tab">
            @foreach($Options as $item => $field) <x-submit-form-option-item :title="$Title" :item="$item" :field="$kebab . '-' . HEAD_FIELD_DISPLAY[$field]"></x-submit-form-option-item> @endforeach
        </div>
        @endforeach
    </div>
</form>
