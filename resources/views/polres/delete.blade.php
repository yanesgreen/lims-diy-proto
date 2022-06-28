<form id="form-create" method="post" action="{{ route('polres.softdelete', $polres->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $polres->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $polres->aktif }}">
</form>