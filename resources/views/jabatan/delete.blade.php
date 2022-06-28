<form id="form-create" method="post" action="{{ route('jabatan.softdelete', $jabatan->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $jabatan->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $jabatan->aktif }}">
</form>
