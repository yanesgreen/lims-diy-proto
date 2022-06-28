<form id="form-create" method="post" action="{{ route('lembaga.softdelete', $lembaga->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $lembaga->nama }}?
    </p>
</form>
