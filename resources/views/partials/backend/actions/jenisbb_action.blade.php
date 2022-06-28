<a class="px-2 text-decoration-none btn-edit"
   href="{{ route('jenisbb.edit', $id) }}"
   title="Edit {{ $nama }}">
    <i class="fas fa-edit text-secondary"></i>
</a>
<a class="px-2 text-decoration-none btn-delete"
   href="{{ route('jenisbb.delete', $id) }}"
   title="Hapus {{ $nama }}">
    <i class="fas fa-trash text-danger"></i>
</a>
