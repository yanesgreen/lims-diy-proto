<form id="form-create" method="post" action="{{ route('polsek.softdelete', $polsek->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $polsek->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $polsek->aktif }}">
</form>