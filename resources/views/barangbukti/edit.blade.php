<form id="form-create"
      method="post"
      action="{{ route('barangbukti.update', ['barangbukti'=> $barangbukti->id]) }}">
    @csrf
    @method('put')

    {{--Jenis Barang Bukti--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Jenis Barang Bukti
        </label>
        <select class="form-control select2"
                id="selectBB"
                name="jenisbb_id"
                style="width: 100%">
            <option value="" disabled selected>Pilih Jenis Barang Bukti</option>
            @if (!empty($bidang))
                @foreach ($bidang as $indexBidang => $bdng)
                    <optgroup label="{{ $bdng }}">
                        @if (!empty($jenisbb))
                            @foreach ($jenisbb as $indexJenisbb => $jnsbb)
                                @if ($jnsbb->bidang_id == $indexBidang)
                                    <option
                                        value="{{ $jnsbb->id }}" {{ ($barangbukti->jenisbb_id == $jnsbb->id) ? 'selected' : '' }}>
                                        {{ $jnsbb->nama }}
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </optgroup>
                @endforeach
            @endif
        </select>
        <small id="helper-jenisbb_id" class="form-text text-danger"></small>
    </div>

    {{--Jumlah--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">Jumlah</label>
        <input type="text" name="jumlah" class="form-control" value="{{ $barangbukti->jumlah }}">
        <small id="helper-jumlah" class="form-text text-danger">{{ $errors->first('jumlah') }}</small>
    </div>

    {{--Berat--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">Berat</label>
        <input type="text" name="berat" class="form-control" value="{{ $barangbukti->berat }}">
        <small id="helper-berat" class="form-text text-danger">{{ $errors->first('berat') }}</small>
    </div>

</form>
