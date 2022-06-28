<form id="form-create" method="post" action="{{ route('pangkat.softdelete', $pangkat->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $pangkat->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $pangkat->aktif }}">
</form>
