<form id="form-create"
      method="post"
      action="{{ route('subbidang.softdelete', ['bidang'=> $bidang->id, 'subbidang' => $subbidang->id]) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus {{ $subbidang->nama }}?
    </p>
    <input type="text" name="nama" class="d-none" value="{{ $subbidang->id }}">
</form>


