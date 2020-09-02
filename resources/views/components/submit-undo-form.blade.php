<form method="post" action="{{ $action }}" name="submit-undo-form" enctype="multipart/form-data">@csrf
    <input type="hidden" name="action" value="undo">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="item" value="undo">
    <input type="hidden" name="records" value="">
</form>
