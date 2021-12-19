<!DOCTYPE html>
<html lang="vie">
<head>
    <x-head/>
</head>
<body>
<x-body>
    <x-body.main>
        @yield('content')
    </x-body.main>
</x-body>
    <div class="warp-loading-block hidden" id="warp-loading-block">
        <div class="warp-bg"></div>
        <div class="sk-cube-grid ajax-loading-icon">
            <div class="on-loading"></div>
        </div>
    </div>

<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
