<!doctype html>
<html lang="en">

    <head>
        
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- <meta name="title" content=" Laman tracer study merupakan sebuah website yang memberikan informasi seputar data alumni mulai dari magang hingga pekerjaan ">
        <meta name="description" content="sistem informasi adalah suatu sistem yang  mengkombinasikan antara aktivitas manusia dan penggunaan teknologi untuk mendukung manajemen dan kegiatan operasional yang dimana merujuk pada sebuah hubungan yang tercipta berdasarkan interaksi manusia, data, informasi, teknologi, dan algoritma.alumni adalah lulusan sebuah sekolah, perguruan tinggi, atau universitas.maka sistem alumni adalah sistem informasi para alumni yang akan ditampilkan dengan adanya data informasi nilai semasa sekolah, prestasi lomba, pengalaman berorganisasi, jurusan sekolah, magang, hingga kerja untuk memberikan pandangan studi belajar siswa menjadi lebih terarah dan relevan"> --}}
        <meta name="keywords" content="tracer study, study, akademik">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <!-- Primary Meta Tags -->
        <title>Tracer Study</title>
        <meta name="title" content="Tracer Study" />
        <meta name="description" content="Laman tracer study merupakan sebuah website yang memberikan informasi seputar data alumni mulai dari magang hingga pekerjaan " />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:title" content="Tracer Study" />
        <meta property="og:description" content="Laman tracer study merupakan sebuah website yang memberikan informasi seputar data alumni mulai dari magang hingga pekerjaan " />
        <meta property="og:image" content="{{ asset('landing/images/logo-st-sm.png') }}" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="{{ url('/') }}" />
        <meta property="twitter:title" content="Tracer Study" />
        <meta property="twitter:description" content="Laman tracer study merupakan sebuah website yang memberikan informasi seputar data alumni mulai dari magang hingga pekerjaan " />
        <meta property="twitter:image" content="{{ asset('landing/images/logo-st-sm.png') }}" />

        <!-- Meta Tags Generated with https://metatags.io -->

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{  asset('landing/images/favicon.ico') }}">

        <!-- Choise Css -->
        <link rel="stylesheet" href="{{  asset('landing/libs/choices.js/public/assets/styles/choices.min.css') }}">

        <!-- Swiper Css -->
        <link rel="stylesheet" href="{{  asset('landing/libs/swiper/swiper-bundle.min.css') }}">

        <!-- Bootstrap Css -->
        <link href="{{  asset('landing/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"/>
        <!-- Icons Css -->
        <link href="{{  asset('landing/css/icons.min.css') }}" rel="stylesheet" />
        <!-- App Css-->
        <link href="{{  asset('landing/css/app.min.css') }}" id="app-style" rel="stylesheet" />
        <!--Custom Css-->
        @stack('css')

        <style>
            .navbar {
                margin-top: 39px;
            }
        </style>
    </head>

    <body >
        <!--start page Loader -->
        @include('landing.layouts.components.preloader')
        <!--end page Loader -->

        <!-- Begin page -->
        <div>

            <!-- START TOP-BAR -->
            @include('landing.layouts.components.top-bar')
            <!-- END TOP-BAR -->

            <!--Navbar Start-->
            @include('landing.layouts.components.nav-bar')
            <!-- Navbar End -->


            <!-- START SIGN-UP MODAL -->
            <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-5">
                            <div class="position-absolute end-0 top-0 p-3">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="auth-content">
                                <div class="w-100">
                                    <div class="text-center mb-4">
                                        <h5>Sign Up</h5>
                                        <p class="text-muted">Sign Up and get access to all the features of Jobcy</p>
                                    </div>
                                    <form action="#" class="auth-form">
                                        <div class="mb-3">
                                            <label for="usernameInput" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="usernameInput" placeholder="Enter your username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="passwordInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">I agree to the <a href="javascript:void(0)" class="text-primary form-text text-decoration-underline">Terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="mt-3 text-center">
                                        <p class="mb-0">Already a member ? <a href="sign-in.html" class="form-text text-primary text-decoration-underline"> Sign-in </a></p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end modal-body-->
                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div>
            <!-- END SIGN-UP MODAL -->

            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->

                @include('landing.layouts.components.footer')
                
                <!-- Style switcher -->
                <div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
                    <div>
                        <h6>Select your color</h6>
                        <ul class="pattern list-unstyled mb-0">
                            <li>
                                <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
                            </li>
                            <li>
                                <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
                            </li>
                            <li>
                                <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <h6>Light/dark Layout</h6>
                            <div class="text-center mt-3">
                                <!-- light-dark mode -->
                                <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                                    <i class="uil uil-brightness mode-dark mx-auto"></i>
                                    <i class="uil uil-moon mode-light"></i>
                                </a>
                                <!-- END light-dark Mode -->
                            </div>
                        </div>
                    </div>
                    <div class="bottom d-none d-md-block" >
                        <a href="javascript: void(0);" class="settings rounded-end"><i class="mdi mdi-cog mdi-spin"></i></a>
                    </div>
                </div>
                <!-- end switcher-->

                <!--start back-to-top-->
                <button onclick="topFunction()" id="back-to-top">
                    <i class="mdi mdi-arrow-up"></i>
                </button>
                <!--end back-to-top-->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{  asset('landing/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>


        <!-- Choice Js -->
        <script src="{{  asset('landing/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        
        <!-- Swiper Js -->
        <script src="{{  asset('landing/libs/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Index Js -->
        {{-- <script src="{{  asset('landing/js/pages/job-list.init.js') }}"></script> --}}

        <!-- Switcher Js -->
        <script src="{{  asset('landing/js/pages/switcher.init.js') }}"></script>

        <script src="{{  asset('landing/js/pages/index.init.js') }}"></script>
        
        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- App Js -->
        <script src="{{  asset('landing/js/app.js') }}"></script>
        @if (Session::has('message'))
        <script>
            Swal.fire({
                icon: `{{ Session::get('message_type') }}`,
                title: `{{ Session::get('message_type') == 'success' ? 'Berhasil' : 'Gagal' }}`,
                text: `{{ Session::get('message') }}`,
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
        @endif
        @stack('js')
    </body>
</html>
