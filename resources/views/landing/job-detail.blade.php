@extends('landing.layouts.master')
@section('content')
<!-- Start home -->
<section class="page-title-box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h3 class="mb-4">Detail Pekerjaan</h3>
                    <div class="page-next">
                        <nav class="d-inline-block" aria-label="breadcrumb text-center">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Pekerjaan</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Detail </li>
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


<!-- START JOB-DEATILS -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card job-detail overflow-hidden">
                    <div>
                        <img src="{{ asset('landing/images/job-detail.jpg') }}" alt="" class="img-fluid">
                        <div class="job-details-compnay-profile">
                            <img src="{{ asset($job->company_logo) }}" style="max-width: 150px" alt="" class="img-fluid rounded-3 rounded-3">
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="mb-1">{{ $job->title }}</h5>
                                    <ul class="list-inline text-muted mb-0">
                                        <li class="list-inline-item">
                                            <i class="mdi mdi-account"></i> {{ $job->applied_count }} Pelamars
                                        </li>
                                        <li class="list-inline-item text-warning review-rating" hidden>
                                            <span class="badge bg-warning">4.8</span> <i class="mdi mdi-star align-middle"></i><i class="mdi mdi-star align-middle"></i><i class="mdi mdi-star align-middle"></i><i class="mdi mdi-star align-middle"></i><i class="mdi mdi-star-half-full align-middle"></i>
                                        </li>
                                    </ul>
                                </div><!--end col-->
                                <div class="col-lg-4" hidden>
                                    <ul class="list-inline mb-0 text-lg-end mt-3 mt-lg-0">
                                        <li class="list-inline-item">
                                            <div class="favorite-icon">
                                                <a href="javascript:void(0)"><i class="uil uil-heart-alt"></i></a>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="favorite-icon">
                                                <a href="javascript:void(0)"><i class="uil uil-setting"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->    
                        </div>

                        <div class="mt-4">
                            <div class="row g-2">
                                <div class="col-lg-3">
                                    <div class="border rounded-start p-3">
                                        <p class="text-muted mb-0 fs-13">Pengalaman</p>
                                        <p class="fw-medium fs-15 mb-0">{{ $job->experience }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="border p-3">
                                        <p class="text-muted fs-13 mb-0">Tipe Pekerjaan</p>
                                        <p class="fw-medium mb-0">{{ $job->job_type }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="border p-3">
                                        <p class="text-muted fs-13 mb-0">Jabatan</p>
                                        <p class="fw-medium mb-0">{{ $job->position }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="border rounded-end p-3">
                                        <p class="text-muted fs-13 mb-0">Penawaran Gaji</p>
                                        <p class="fw-medium mb-0">Rp. {{ $job->sallary }}Jt/Bulan</p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end Experience-->

                        <div class="mt-4">
                            <h5 class="mb-3">Deskripsi Pekerjaan</h5>
                            <div class="job-detail-desc">
                                <p class="text-muted mb-0">
                                    {!! $job->description !!}
                                </p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="mb-3">Tanggung jawab</h5>
                            <div class="job-detail-desc mt-2">
                                {!! $job->responsibility !!}
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end job-detail-->

            </div><!--end col-->

            <div class="col-lg-4 mt-4 mt-lg-0">
                <!--start side-bar-->
                <div class="side-bar ms-lg-4">
                    <div class="card job-overview">
                        <div class="card-body p-4">
                            <h6 class="fs-17">Detail Pekerjaan</h6>
                            <ul class="list-unstyled mt-4 mb-0">
                                <li>
                                    <div class="d-flex mt-4">
                                        <i class="uil uil-user icon bg-primary-subtle text-primary"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">Posisi</h6>
                                            <p class="text-muted mb-0">{{ $job->position }}</p> 
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex mt-4">
                                        <i class="uil uil-star-half-alt icon bg-primary-subtle text-primary"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">Pengalaman</h6>
                                            <p class="text-muted mb-0"> {{ $job->experience }}</p> 
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex mt-4">
                                        <i class="uil uil-location-point icon bg-primary-subtle text-primary"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">Lokasi</h6>
                                            <p class="text-muted mb-0"> {{ $job->placement }}</p> 
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex mt-4">
                                        <i class="uil uil-usd-circle icon bg-primary-subtle text-primary"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">Penawaran Gaji</h6>
                                            <p class="text-muted mb-0">Rp. {{ $job->sallary }}Jt/Bulan</p> 
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex mt-4">
                                        <i class="uil uil-graduation-cap icon bg-primary-subtle text-primary"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">Kualifikasi</h6>
                                            <p class="text-muted mb-0">{{ $job->program_study_name }}</p> 
                                        </div>
                                    </div>
                                </li>   
                            </ul>
                            <div class="mt-3">
                                <a href="#applyNow" data-bs-toggle="modal" data-job_id="{{ $job->id }}" class="btn btn-primary btn-hover w-100 mt-2">Lamar Sekarang <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end job-overview-->

                </div>
                <!--end side-bar-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- START JOB-DEATILS -->

<!-- START APPLY MODAL -->
@include('landing.components.apply-modal')
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

        $('#applyNow').on('show.bs.modal', function(e) {
            var job_id = e.relatedTarget.dataset.job_id;
            
            $('input[name=job_id]').val(job_id);
        });
    </script>
@endpush