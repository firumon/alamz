<form method="post" action="{{ $action }}" name="mark-form">@csrf
    <input type="hidden" name="action" value="submit">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="records" value="">

    <div class="form-group">
        <label for="compliance-status">Select Status</label>
        <select name="status" id="compliance-status" class="form-control">@foreach(config('alramz.options.ComplianceStatus') as $option) <option value="{{ $option }}">{{ $option }}</option> @endforeach</select>
    </div>
    <textarea class="form-control" name="note" placeholder="Comments if any!!"></textarea>
</form>
