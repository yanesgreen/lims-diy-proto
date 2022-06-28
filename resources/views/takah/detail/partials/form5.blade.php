<div class="card">
    <div class="card-header bg-primary">
        <p class="mb-0 text-white">
            5. Pemeriksa Forensik
        </p>
    </div>
    <div>
        <div class="card-body">

            @if (!empty($takah->pemeriksa))
                @foreach ($takah->pemeriksa as $index => $pemeriksa)
                    {{--Pemeriksa 1--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Nama Pemeriksa {{ $index + 1 }}
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" readonly value="{{ $pemeriksa->nama }}">
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

