@include('layouts.DarkPan_section.header')


<!-- Sign In Start -->
<style>
    .container-fluid {
        background-image: url('{{ url("DarkPan/img/bg12.jpg") }}') !important;
        background-repeat: no-repeat;
        background-size: 100vw 100vh ;
    }
</style>

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    @if (\Session::has('error'))
                        <div class="alert alert-primary" role="alert">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        {{-- <a href="{{ route('Dark-Pan-theme.index')}}" class="">
                        </a> --}}
                            <h3 class="text-primary">Admin Login</h3>
                        {{-- <h3>Sign In</h3> --}}
                    </div>
                    <form action="{{ route('Dark-Pan-theme.login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div> --}}
                        <button type="submit" class="btn btn-outline-primary py-3 w-100 mb-4">Sign In</button>
                    </form>
                    {{-- <p class="text-center mb-0">Don't have an Account? <a href="{{ route('Dark-Pan-theme.Sign_up') }}">Sign
                            Up</a></p> --}}
                </div>
            </div>
        </div>
    </div>

<!-- Sign In End -->
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('DarkPan/lib/chart/chart.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/easing/easing.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('DarkPan/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ url('DarkPan/js/main.js') }}"></script>
</body>

</html>
