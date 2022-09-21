@include('layouts.DarkPan_section.header')

@include('layouts.DarkPan_section.sidebar')

<!-- Content Start -->
<div class="content">
    @yield('content')
    @include('layouts.DarkPan_section.footer')
</div>
<!-- Content End -->

@include('layouts.DarkPan_section.script')