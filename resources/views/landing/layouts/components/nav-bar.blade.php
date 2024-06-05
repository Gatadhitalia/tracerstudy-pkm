<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container-fluid custom-container">
        <a class="navbar-brand text-dark fw-bold me-auto" href="{{ route('landing.index') }}">
            <img src="{{  asset('landing/images/logo-st.png') }}" height="43" alt="" class="logo-dark" />
            <img src="{{  asset('landing/images/logo-st.png') }}" height="43" alt="" class="logo-light" />
        </a>
        <div>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto navbar-center">
                <li class="nav-item">
                    <a href="/" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item" style="display: none">
                    <a href="/alumni" class="nav-link">Alumni</a>
                </li>
                <li class="nav-item">
                    <a href="/job" class="nav-link">Pekerjaan</a>
                </li>
                <li class="nav-item">
                    <a href="/job?&job_type=Magang" class="nav-link">Magang</a>
                </li>
                <li class="nav-item" style="display: none">
                    <a href="/faq" class="nav-link">FAQ</a>
                </li>
                <li class="nav-item" style="display: none">
                    <a href="/fill-data" class="nav-link">Isi Data</a>
                </li>
                
            </ul><!--end navbar-nav-->
        </div>
        <!--end navabar-collapse-->
        <a href="{{ route('getLogin') }}"
            <button type="button" class="btn btn-purple rounded-pill">
                @if (CRUDBooster::me()->student_id)
                    Dashboard Mahasiswa
                @elseif (CRUDBooster::me())
                    Dashboard Admin
                @else
                    Masuk
                @endif
            </button>
        </a>

    </div>
    <!--end container-->
</nav>