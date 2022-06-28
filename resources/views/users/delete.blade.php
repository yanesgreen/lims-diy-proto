<form id="form-create" method="post" action="{{ route('pengguna.softdelete', $user->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data <span class="text-capitalize">{{ $user->nama }}</span> ?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $user->aktif }}">
</form>
