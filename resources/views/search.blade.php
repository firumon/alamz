<form>
    <div class="input-group">@forelse(request()->query() as $k => $v) <input type="hidden" name="{{ $k }}" value="{{ $v }}"> @empty &nbsp; @endforelse
        <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="search_text" value="{{ request()->search_text }}">
        <div class="input-group-append"><button class="btn" type="submit"><i class="fas fa-search"></i> Search</button></div>
    </div>
</form>
