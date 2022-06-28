<a
    href="{{ route('takah.edit.izin', $id) }}"
    @if ($editable === 0)
    class="px-2 btn btn-sm btn-secondary btn-edit"
    title="Berikan Izin Edit Kepada"
    @else
    class="px-2 btn btn-sm btn-danger btn-edit"
    title="Cabut Izin Edit"
    @endif
>
    {{$editable === 0 ? 'beri izin' : 'cabut izin'}}
</a>

