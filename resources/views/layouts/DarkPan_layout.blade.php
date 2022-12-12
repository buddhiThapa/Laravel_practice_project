@include('layouts.DarkPan_section.header')

@include('layouts.DarkPan_section.sidebar')

<!-- Content Start -->
<div class="content">
    @include('layouts.DarkPan_section.navbar')<!-- Navbar -->
    @include('layouts.DarkPan_section.flash-message')<!-- Flash Message -->
    @yield('content')<!-- Content  -->
    @include('layouts.DarkPan_section.footer')<!-- Foote -->
</div>
<!-- Content End -->

@include('layouts.DarkPan_section.script')<!-- Script -->