<form id="form-create" method="post" action="{{ route('takah.update.izin', $takah->id) }}">
    @csrf
    @method('put')
    @if($takah->editable == 0)
        <div class="form-group">
            <label class="col-form-label text-lg-right">NRP/NIP</label>
            <input type="text" name="editor_id" class="form-control">
            <small id="editor_id-nama" class="form-text text-danger">{{ $errors->first('editor_id') }}</small>
        </div>
    @else
        <div class="form-group">
            <label class="col-form-label text-lg-right">NRP/NIP</label>
            <input type="text" name="editor_id" class="form-control" value="{{ $takah->editor_id }}" readonly>
        </div>
    @endif
</form>
