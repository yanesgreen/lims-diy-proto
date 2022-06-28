<form id="form-create" method="post" action="{{ route('bidang.softdelete', $bidang->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $bidang->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $bidang->aktif }}">
</form>
