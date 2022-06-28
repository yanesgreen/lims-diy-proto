<form id="form-create"
      method="post"
      action="{{ route('barangbukti.softdelete', ['barangbukti'=> $barangbukti->id]) }}">
    @csrf
    @method('patch')
    <p class="text-center my-3">
        Apakah anda yakin ingin menghapus barang bukti {{ $barangbukti->jenisbb->nama }}?
    </p>
</form>


