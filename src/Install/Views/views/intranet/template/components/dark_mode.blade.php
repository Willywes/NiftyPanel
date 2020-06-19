@if(auth('intranet')->check() and auth('intranet')->user()->dark_mode)
    <link id="dark_mode" href="/themes/intranet/css/themes/type-full/theme-dark-full.min.css" rel="stylesheet">
@else
@endif
