@extends('landing.layouts.master')
@push('css')
    <style>
        .choices__list {
            z-index: 99 !important;
        }
    </style>
@endpush
@section('content')
<!-- Start home -->
<section class="page-title-box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h3 class="mb-4">Daftar Pekerjaan {{ g('job_type') }}</h3>
                    <div class="page-next">
                        <nav class="d-inline-block" aria-label="breadcrumb text-center">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Daftar Pekerjaan </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- end home -->

<!-- START SHAPE -->
<div class="position-relative" style="z-index: 1">
    <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
            <path fill="" fill-opacity="1"
                d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
        </svg>
    </div>
</div>
<!-- END SHAPE -->


<!-- START JOB-LIST -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="me-lg-5">
                    <div class="job-list-header">
                        <form action="#">
                            <div class="row g-2">
                                <div class="col-lg-5 col-md-6">
                                    <div class="filler-job-form">
                                        <i class="uil uil-briefcase-alt"></i>
                                        <input type="search" class="form-control filter-job-input-box" name="search" placeholder="Nama pekerjaan, perusahaan... " value="{{ g('search') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 col-md-6">
                                    <div class="filler-job-form">
                                        <i class="uil uil-location-point"></i>
                                        <select class="form-select" name="placement" id="placement" aria-label="Pilih penempatan">
                                            <option value="all" {{ g('placement') === $placement ? 'all' : '' }}>Semua Lokasi Penempatan</option>
                                            @foreach ($placements as $placement)
                                            <option {{ g('placement') === $placement ? 'selected' : '' }} value="{{ $placement }}">{{ $placement }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-md-6">
                                    <button type="submit" class="btn btn-primary w-100"><i class="uil uil-filter"></i> Cari  </button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end job-list-header-->
                    <div class="wedget-popular-title mt-4">
                        <h6>Pekerjaan Terbaru</h6>
                        <ul class="list-inline">
                            <style>
                                .box-active {
                                    background-color: rgba(var(--bs-primary-rgb),.15);
                                    border: solid 1px #cdcbcb !important;
                                }
                            </style>
                            @php
                                $url = request()->url();
                                $param_job_category_id = request()->query();
                                unset($param_job_category_id['job_category_id']);

                                $url_job_category_id = "$url?".http_build_query($param_job_category_id);
                            @endphp
                            @foreach ($job_categories as $category)
                            <li class="list-inline-item">
                                <div class="popular-box d-flex align-items-center {{ g('job_category_id') == $category->id ? 'box-active' : '' }}" >
                                    <div class="number flex-shrink-0 me-2 active">
                                        {{ $category->job_count }}
                                    </div>
                                    <a href="{{ $url_job_category_id }}&job_category_id={{ $category->id }}" class="primary-link stretched-link">
                                        <h6 class="fs-14 mb-0">{{ $category->name }}</h6>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--end wedget-popular-title-->
                    <!-- Job-list -->
                    <div>
                        @foreach ($jobs as $job)
                            @include('landing.components.job-card', ['job' => $job])
                        @endforeach
                        @if(count($jobs) === 0)
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <div class="card" style="width:100%">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <h3 class="text-center">Oooops...</h3>
                                    <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- End Job-list -->
                    <div class="row">
                        <div class="col-lg-12 mt-4 pt-2">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination job-pagination mb-0 justify-content-center">
                                    @php
                                        $url = request()->url();
                                        $param_page = request()->query();
                                        unset($param_page['page']);

                                        $url_page = "$url?".http_build_query($param_page);
                                        $current_page = g('page') ?? 1;

                                        $has_prev = $current_page == 1 ? false : ($job_page_count > 1);
                                        $has_next = $current_page == $job_page_count ? false : ($job_page_count > 1);
                                    @endphp
                                    @if($has_prev)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url_page }}&page={{ $current_page-1 }}" tabindex="-1">
                                            <i class="mdi mdi-chevron-double-left fs-15"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for ($page=1; $page <= $job_page_count; $page++)
                                        <li class="page-item {{ $current_page == $page ? 'active' : '' }}"><a class="page-link" href="{{ $url_page }}&page={{ $page }}">{{ $page }}</a></li>
                                    @endfor
                                    @if($has_next)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url_page }}&page={{ $current_page+1 }}">
                                            <i class="mdi mdi-chevron-double-right fs-15"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!--end col-->
                    </div><!-- end row -->
                </div>
            </div>
            <!--end col-->

            <!-- START SIDE-BAR -->
            <div class="col-lg-3">
                <div class="side-bar mt-5 mt-lg-0">
                    <div class="accordion" id="accordionExample">
                        {{-- 
                            Fresh Graduate
                            Minimal 1 tahun
                            Minimal 2 tahun
                            Minimal 3 tahun
                            Profesional
                        --}}
                        <div class="accordion-item mt-4">
                            <h2 class="accordion-header" id="experienceOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="true" aria-controls="experience">
                                    Pengalaman Kerja
                                </button>
                            </h2>
                            @php
                                $url = request()->url();
                                $param_experience = request()->query();
                                unset($param_experience['experience']);

                                $url_experience = "$url?".http_build_query($param_experience);
                                $experiences = explode(';', 'Fresh Graduate;Minimal 1 tahun;Minimal 2 tahun;Minimal 3 tahun;Profesional');
                            @endphp
                            <div id="experience" class="accordion-collapse collapse show" aria-labelledby="experienceOne">
                                <div class="accordion-body">
                                    <div class="side-title">
                                        @foreach ($experiences as $experience)
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" name="experience" {{ g('experience') == $experience ? 'checked' : '' }} id="experience-{{ $loop->iteration }}" type="radio" value="{{ $experience }}" onchange="window.location='{{ $url_experience }}&experience={{ $experience }}'" />
                                            <label class="form-check-label ms-2 text-muted" for="experience-{{ $loop->iteration }}">{{ $experience }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- end accordion-item -->

                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header" id="jobType">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#jobtype" aria-expanded="false" aria-controls="jobtype">
                                    Tipe Pekerjaan
                                </button>
                            </h2>
                            @php
                                $url = request()->url();
                                $param_job_type = request()->query();
                                unset($param_job_type['job_type']);

                                $url_job_type = "$url?".http_build_query($param_job_type);
                                $job_types = explode(';', 'Part Time;Full Time;Sementara;Kontrak;Magang');
                            @endphp
                            <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                <div class="accordion-body">
                                    <div class="side-title">
                                        @foreach ($job_types as $job_type)
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" name="job_type" {{ g('job_type') == $job_type ? 'checked' : '' }} id="job_type-{{ $loop->iteration }}" type="radio" value="{{ $job_type }}" onchange="window.location='{{ $url_job_type }}&job_type={{ $job_type }}'" />
                                            <label class="form-check-label ms-2 text-muted" for="job_type-{{ $loop->iteration }}">{{ $job_type }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- end accordion-item -->

                    </div>
                    <!--end accordion-->

                </div>
                <!--end side-bar-->
            </div>
            <!--end col-->
            <!-- END SIDE-BAR -->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!-- END JOB-LIST -->

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