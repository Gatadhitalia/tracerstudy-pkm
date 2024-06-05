@extends('landing.layouts.master')
@section('content')

<!-- START HOME -->
<section class="bg-home2" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="mb-4 pb-3 me-lg-5">
                    <h6 class="sub-title">Kami memiliki 15,000+ lowongan pekerjaan</h6>
                    <h1 class="display-5 fw-semibold mb-3">Selamat datang di <span class="text-primary fw-bold">Tracer Study</span></h1>
                    <p class="lead text-muted mb-0">
                        Laman tracer study merupakan sebuah website yang memberikan informasi seputar data alumni mulai dari magang hingga pekerjaan
                    </p>
                </div>
                <form action="{{ route('landing.job') }}">
                    <div class="registration-form">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="filter-search-form filter-border mt-3 mt-md-0">
                                    <i class="uil uil-briefcase-alt"></i>
                                    <input type="search" id="job-title" class="form-control filter-input-box" placeholder="Nama pekerjaan, perusahaan...">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="filter-search-form mt-3 mt-md-0">
                                    <i class="uil uil-map-marker"></i>
                                    <select class="form-select" name="placement" id="placement" aria-label="Pilih penempatan">
                                        <option value="all" {{ g('placement') === $placement ? 'all' : '' }}>Semua Lokasi</option>
                                        @foreach ($placements as $placement)
                                        <option {{ g('placement') === $placement ? 'selected' : '' }} value="{{ $placement }}">{{ $placement }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-4">
                                <div class="mt-3 mt-md-0 h-100">
                                    <button class="btn btn-primary submit-btn w-100 h-100" type="submit"><i class="uil uil-search me-1"></i> Cari Pekerjaan</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </form>
            </div>
            <!--end col-->
            <div class="col-lg-5">
                <div class="mt-5 mt-md-0">
                    <img src="{{  asset('landing/images/process-02.png') }}" alt="" class="home-img" /> 
                </div>
            </div><!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->    
</section>
<!-- End Home -->

<!-- START SHAPE -->
<div class="position-relative">
    <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 220">
            <g mask="url(&quot;#SvgjsMask1004&quot;)" fill="none">
                <path d="M 0,213 C 288,186.4 1152,106.6 1440,80L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
            </g>
            <defs>
                <mask id="SvgjsMask1004">
                    <rect width="1440" height="250" fill="#ffffff"></rect>
                </mask>
            </defs>
        </svg>
    </div>
</div>
<!-- END SHAPE -->

<!-- START CATEGORY -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h3 class="title">Kategori Pekerjaan </h3>
                    <p class="text-muted">Cari pekerjaan bedasarkan minat dan bakat anda, tersedia banyak kategori dengan tingkatan yang berbeda beda.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            @php
                $url = route('landing.job');
                $param_job_category_id = request()->query();
                unset($param_job_category_id['job_category_id']);

                $url_job_category_id = "$url?".http_build_query($param_job_category_id);
            @endphp
            @foreach ($job_categories as $category)
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
                <div class="popu-category-box rounded text-center">
                    <div class="popu-category-icon icons-md">
                        <i class="uim uim-layers-alt"></i>
                    </div>
                    <div class="popu-category-content mt-4">
                        <a href="{{ $url_job_category_id }}&job_category_id={{ $category->id }}" class="text-dark stretched-link">
                            <h5 class="fs-18">{{ $category->name }}</h5>
                        </a>
                        <p class="text-muted mb-0">{{ $category->job_count }} Jobs</p>
                    </div>
                </div><!--end popu-category-box-->
            </div>
            <!--end col-->
            @endforeach
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5 text-center">
                    <a href="{{ route('landing.job') }}" class="btn btn-primary btn-hover">Cari semua kategori <i class="uil uil-arrow-right ms-1"></i></a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END CATEGORY -->

<!-- START JOB-LIST -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title">Pekerjaan acak terbaru</h4>
                    <p class="text-muted mb-1">Cari pekerjaan bedasarkan minat dan bakat anda, tersedia banyak kategori dengan tingkatan yang berbeda beda.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <ul class="job-list-menu nav nav-pills nav-justified flex-column flex-sm-row mb-4" id="pills-tab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="recent-jobs-tab" data-bs-toggle="pill"
                            data-bs-target="#recent-jobs" type="button" role="tab" aria-controls="recent-jobs"
                            aria-selected="true">Pekerjaan Terbaru</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="most-suitable-tab" data-bs-toggle="pill"
                            data-bs-target="#most-suitable" type="button" role="tab" aria-controls="most-suitable"
                            aria-selected="false">Paling Sesuai</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="part-time-tab" data-bs-toggle="pill"
                            data-bs-target="#part-time" type="button" role="tab" aria-controls="part-time"
                            aria-selected="false">Part Time</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="full-time-tab" data-bs-toggle="pill"
                            data-bs-target="#full-time" type="button" role="tab" aria-controls="full-time"
                            aria-selected="false">Full Time</button>
                    </li>
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="recent-jobs" role="tabpanel"
                        aria-labelledby="recent-jobs-tab">
                        
                        @foreach ($jobs_newest as $job)
                            @include('landing.components.job-card', ['job' => $job])
                        @endforeach
                        <!--end job-box-->

                        @if(count($jobs_newest) == 0)
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="card" style="width:600px">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="text-center">Oooops...</h3>
                                        <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="text-center mt-4 pt-2">
                            <a href="{{ route('landing.job') }}" class="btn btn-primary">Lihat Semua <i class="uil uil-arrow-right"></i></a>
                        </div>

                    </div>
                    <!--end recent-jobs-tab-->

                    <div class="tab-pane fade" id="most-suitable" role="tabpanel"
                        aria-labelledby="most-suitable-tab">
                        
                        @if (CRUDBooster::me()->student_id)
                            @foreach ($jobs_suitable as $job)
                                @include('landing.components.job-card', ['job' => $job])
                            @endforeach

                            <div class="text-center mt-4 pt-2">
                                <a href="{{ route('landing.job') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        @elseif(!CRUDBooster::me())
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="card" style="width:600px">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="text-center">Masuk</h3>
                                        <h4 class="mb-3 text-center">Login untuk melanjutkan pencarian paling sesuai</h4>
                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/illustrations/misc/upgrade.svg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4 pt-2">
                                <a href="{{ route('getLogin') }}" class="btn btn-primary">Masuk <i class="uil uil-arrow-right"></i></a>
                            </div>
                        @else
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="card" style="width:600px">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="text-center">Oooops...</h3>
                                        <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif

                        
                    </div>
                    <!--end featured-jobs-tab-->

                    <div class="tab-pane fade" id="part-time" role="tabpanel" aria-labelledby="part-time-tab">
                        @if(isset($jobs_types['Part Time']))
                            @foreach ($jobs_types['Part Time'] as $job)
                                @include('landing.components.job-card', ['job' => $job])
                            @endforeach
                            <div class="text-center mt-4 pt-2">
                                <a href="{{ route('landing.job') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        @else
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="card" style="width:600px">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="text-center">Oooops...</h3>
                                        <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--end part-time-tab-->

                    <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="full-time-tab">
                        @if(isset($jobs_types['Full Time']))
                            @foreach ($jobs_types['Full Time'] as $job)
                                @include('landing.components.job-card', ['job' => $job])
                            @endforeach
                            <div class="text-center mt-4 pt-2">
                                <a href="{{ route('landing.job') }}" class="btn btn-primary">View More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        @else
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <div class="card" style="width:600px">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="text-center">Oooops...</h3>
                                        <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--end full-time-tab-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END JOB-LIST -->

<!-- START PROCESS -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title me-5">
                    <h3 class="title">Tracer Study</h3>
                    <p class="text-muted">Apa saja kegunaan dari aplikasi tracer study ini?</p>
                    <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <div class="d-flex">
                                <div class="number flex-shrink-0">
                                    1
                                </div>
                                <div class="flex-grow-1 text-start ms-3">
                                    <h5 class="fs-18">Digitalisasi Data</h5>
                                    <p class="text-muted mb-0">Memudahkan proses pengolahan data alumni dan saling integrasi data dalam banyak platform.</p>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <div class="d-flex">
                                <div class="number flex-shrink-0">
                                    2
                                </div>
                                <div class="flex-grow-1 text-start ms-3">
                                    <h5 class="fs-18">Laporan Instan</h5>
                                    <p class="text-muted mb-0">Memberikan laporan data perkembangan banyaknya lulusan siswa hingga mahasiswa per tahunnya dalam bentuk file dengan waktu proses instan.</p>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <div class=" d-flex">
                                <div class="number flex-shrink-0">
                                    3
                                </div>
                                <div class="flex-grow-1 text-start ms-3">
                                    <h5 class="fs-18">Lapangan Pekerjaan</h5>
                                    <p class="text-muted mb-0">Memudahkan mahasiswa untuk mencari tahu tempat kerja dan magang yang komprehensif sesuai dengan jurusan masing - masing mahasiswa.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-lg-6">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <img src="{{  asset('landing/images/process-01.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <img src="{{  asset('landing/images/process-02.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <img src="{{  asset('landing/images/process-03.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div> <!--end row-->
    </div><!--end container-->
</section>
<!-- END PROCESS -->

<!--START CTA-->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center">
                    <h2 class="text-primary mb-4">Cari lebih dari <span class="text-warning fw-bold">15,000</span> jenis pekerjaan</h2>
                    <p class="text-muted">Cari pekerjaan bedasarkan minat dan bakat anda, tersedia banyak kategori dengan tingkatan yang berbeda beda.</p>
                    <div class="mt-4 pt-2">
                        <a href="{{ route('getLogin') }}" class="btn btn-primary btn-hover">Mulai Sekarang <i class="uil uil-rocket align-middle ms-1"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!--END CTA-->

<!-- START TESTIMONIAL -->
<section class="section" hidden>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-4 pb-2">
                    <h3 class="title mb-3">Happy Candidates</h3>
                    <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                        right freelancers.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="swiper testimonialSlider pb-5">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card testi-box">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <img src="{{  asset('landing/images/logo/mailchimp.svg') }}" height="50" alt="" />
                                    </div>
                                    <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                        shortcuts. Even if the client is being careless. "</p>
                                    <h5 class="mb-0">Jeffrey Montgomery</h5>
                                    <p class="text-muted mb-0">Product Manager</p>
                                </div>
                            </div>
                        </div><!--end swiper-slide-->
                        <div class="swiper-slide">
                            <div class="card testi-box">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <img src="{{  asset('landing/images/logo/wordpress.svg') }}" height="50" alt="" />
                                    </div>
                                    <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                        shortcuts. Even if the client is being careless. "</p>
                                    <h5 class="mb-0">Rebecca Swartz</h5>
                                    <p class="text-muted mb-0">Creative Designer</p>
                                </div>
                            </div>
                        </div><!--end swiper-slide-->
                        <div class="swiper-slide">
                            <div class="card testi-box">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <img src="{{  asset('landing/images/logo/instagram.svg') }}" height="50" alt="" />
                                    </div>
                                    <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                        shortcuts. Even if the client is being careless. "</p>
                                    <h5 class="mb-0">Charles Dickens</h5>
                                    <p class="text-muted mb-0">Store Assistant</p>
                                </div>
                            </div>
                        </div><!--end swiper-slide-->
                    </div>
                    <!--end swiper-wrapper-->
                    <div class="swiper-pagination"></div>
                </div>
                <!--end swiper-container  -->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</section>
<!-- END TESTIMONIAL -->

<!-- START BLOG -->
<section class="section bg-light" hidden>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-5">
                    <h3 class="title mb-3">Quick Career Tips</h3>
                    <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                        right freelancers.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-box card p-2 mt-3">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="{{  asset('landing/images/blog/img-01.jpg') }}" alt="" class="img-fluid">
                        <div class="bg-overlay"></div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                    class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                        </div>
                        <div class="likes">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                            class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                            class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="primary-link">
                            <h5 class="fs-17">How apps is the IT world ?</h5>
                        </a>
                        <p class="text-muted">The final text is not yet avaibookmark-label. Dummy texts have Internet tend
                            been in use by typesetters.</p>
                        <a href="blog-details.html" class="form-text text-primary">Read more <i class="mdi mdi-chevron-right align-middle"></i></a>
                    </div>
                </div><!--end blog-box-->
            </div><!--end col-->

            <div class="col-lg-4 col-md-6">
                <div class="blog-box card p-2 mt-3">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="{{  asset('landing/images/blog/img-02.jpg') }}" alt="" class="img-fluid">
                        <div class="bg-overlay"></div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                    class="text-light user">Brandon Carney</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 June, 2021</p>
                        </div>
                        <div class="likes">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                            class="mdi mdi-heart-outline me-1"></i> 44</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i
                                            class="mdi mdi-comment-outline me-1"></i> 25</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="primary-link">
                            <h5 class="fs-17">Smartest Applications for Business ?</h5>
                        </a>
                        <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability
                            is of great importance: human perception.</p>
                        <a href="blog-details.html" class="form-text text-primary">Read more <i class="mdi mdi-chevron-right align-middle"></i></a>
                    </div>
                </div><!--end blog-box-->
            </div><!--end col-->

            <div class="col-lg-4 col-md-6">
                <div class="blog-box card p-2 mt-3">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="{{  asset('landing/images/blog/img-03.jpg') }}" alt="" class="img-fluid">
                        <div class="bg-overlay"></div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)"
                                    class="text-light user">William Mooneyhan</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 16 March, 2021
                            </p>
                        </div>
                        <div class="likes">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 68</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 20</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="primary-link">
                            <h5 class="fs-17">Design your apps in your own way ?</h5>
                        </a>
                        <p class="text-muted">One disadvantage of Lorum Ipsum is that in Latin certain letters
                            appear more frequently than others.</p>
                        <a href="blog-details.html" class="form-text text-primary">Read more <i class="mdi mdi-chevron-right align-middle"></i></a>
                    </div>
                </div><!--end blog-box-->
            </div><!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END BLOG -->

<!-- START CLIENT -->
<div class="py-4" hidden>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Woocommerce">
                        <img src="{{  asset('landing/images/logo/logo-01.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Envato">
                        <img src="{{  asset('landing/images/logo/logo-02.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Magento">
                        <img src="{{  asset('landing/images/logo/logo-03.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Wordpress">
                        <img src="{{  asset('landing/images/logo/logo-04.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Generic">
                        <img src="{{  asset('landing/images/logo/logo-05.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="text-center p-3">
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Reveal">
                        <img src="{{  asset('landing/images/logo/logo-06.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</div>
<!-- END CLIENT -->

<!-- START APPLY MODAL -->
@include('landing.components.apply-modal')

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        var singleCategories,
            singleLocation=new Choices("#placement", {
                shouldSort: false,
                shouldSortItems: false,
            });

        $('#applyNow').on('show.bs.modal', function(e) {
            var job_id = e.relatedTarget.dataset.job_id;
            
            $('input[name=job_id]').val(job_id);
        });
    </script>
@endpush