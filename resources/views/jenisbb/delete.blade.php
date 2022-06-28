<form id="form-create" method="post" action="{{ route('jenisbb.softdelete', $jenisbb->id) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus Jenis Barang Bukti {{ $jenisbb->nama }}?
    </p>
</form>


