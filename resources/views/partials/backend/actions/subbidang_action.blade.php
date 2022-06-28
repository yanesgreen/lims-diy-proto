<a class="px-2 text-decoration-none btn-edit"
   href="{{ route('subbidang.edit', ['bidang'=>$bidang_id, 'subbidang'=>$id]) }}"
   title="Edit {{ $nama }}">
    <i class="fas fa-edit text-secondary"></i>
</a>
<a class="px-2 text-decoration-none btn-delete"
   href="{{ route('subbidang.delete', ['bidang'=>$bidang_id, 'subbidang'=>$id]) }}"
   title="Hapus {{ $nama }}">
    <i class="fas fa-trash text-danger"></i>
</a>
