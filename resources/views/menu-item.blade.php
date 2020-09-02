<li class="nav-item @if (isset($item['submenu'])) has-treeview @endif">
    <a href="{{ $href = \Illuminate\Support\Facades\Route::has($item['href']) ? route($item['href']) : $item['href'] }}" class="nav-link @if($href === request()->getUri()) active @endif">
        <i class="{{ 'fas mr-1 fa-fw fa-' . ($item['icon'] ?? 'circle') }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
        <p>{{ $item['text'] }}@if (isset($item['submenu']))<i class="fas fa-angle-left right"></i>@endif</p>
    </a>
    @if (isset($item['submenu']))
        <ul class="nav nav-treeview">
            @each('menu-item', $item['submenu'], 'item')
        </ul>
    @endif
</li>
{{--text,href,icon,icon_color,submenu--}}
