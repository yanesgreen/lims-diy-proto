<form id="form-create" method="post" action="{{ route('polda.softdelete', $polda->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $polda->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $polda->aktif }}">
</form>