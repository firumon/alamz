@php $types = config('alramz.submit_item_types'); $type = $types[$item];  $input_types = ['text','number','email','file']; @endphp
@if(in_array($type,$input_types))
    <input type="{{ $type }}" name="{{ $field }}" @if(!config("alramz.submit_optional.$title") || !in_array($item,config("alramz.submit_optional.$title"))) data-mandatory="{{ $title }}" @endif class="my-1 form-control{{ $type === 'file' ? '-file' : '' }}" placeholder="{{ $item }}">
@elseif($type === 'textarea')
    <textarea name="{{ $field }}" class="form-control" placeholder="{{ $item }}" @if(!config("alramz.submit_optional.$title") || !in_array($item,config("alramz.submit_optional.$title"))) data-mandatory="{{ $title }}" @endif></textarea>
@endif

