<a class="px-2 text-decoration-none btn-edit"
   href="{{ route('polres.edit', $id) }}"
   title="Edit {{ $nama }}">
    <i class="fas fa-edit text-primary"></i>
</a>
<a class="px-2 text-decoration-none btn-delete"
   href="{{ route('polres.delete', $id) }}"
   title="Hapus {{ $nama }}">
    <i class="fas fa-trash text-danger"></i>
</a>