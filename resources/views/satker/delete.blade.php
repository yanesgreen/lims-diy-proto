<form id="form-create" method="post" action="{{ route('satker.softdelete', $satker->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $satker->nama }}?
    </p>
</form>
