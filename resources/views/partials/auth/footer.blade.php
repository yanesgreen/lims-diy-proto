{{--footer--}}
<footer class="d-flex flex-column font-xs">
    {{--App Version--}}
    <small class="d-block text-info">{{ appVersion() }}</small>
    {{--back--}}
    <a id="back" href="{{ route('landingpage') }}" class="mt-5 mb-1">
        &leftarrow; Kembali ke beranda
    </a>
</footer>
