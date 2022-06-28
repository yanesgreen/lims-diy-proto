<form id="form-create" method="post" action="{{ route('pemeriksa.softdelete', $pemeriksa->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $pemeriksa->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $pemeriksa->aktif }}">
</form>
