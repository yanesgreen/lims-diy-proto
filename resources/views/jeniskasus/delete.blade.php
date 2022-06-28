<form id="form-create" method="post" action="{{ route('jeniskasus.softdelete', $jeniskasus->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus data {{ $jeniskasus->nama }}?
    </p>
</form>
