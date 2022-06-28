<a class="px-2 text-decoration-none" href="{{ route('pengguna.show', $id) }}"
   data-toggle="tooltip"
   data-placement="top"
   title="Detail {{ $nama }}">
    <i class="fas fa-file text-primary btn-show"></i>
</a>
<a class="px-2 text-decoration-none" href="{{ route('pengguna.edit', $id) }}"
   data-toggle="tooltip"
   data-placement="top"
   title="Edit {{ $nama }}">
    <i class="fas fa-edit text-secondary"></i>
</a>
<a class="px-2 text-decoration-none btn-delete"
   href="{{ route('pengguna.delete', $id) }}"
   title="Hapus {{ $nama }}">
    <i class="fas fa-trash text-danger"></i>
</a>


