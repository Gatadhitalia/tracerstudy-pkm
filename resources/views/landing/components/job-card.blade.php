@php
    $colors = [
        'primary',
        'secondary',
        'warning',
        'success',
        'info',
        'danger',
    ];

@endphp
<!--start job-box-->
<div class="job-box card mt-4">
    <div class="bookmark-label text-center">
        <a href="javascript:void(0)" class="text-white align-middle"><i class="mdi mdi-star"></i></a>
    </div>
    <div class="p-4">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="text-center mb-4 mb-md-0">
                    <a href="company-details.html"><img src="{{  asset($job->company_logo) }}" alt="" class="img-fluid rounded-3"></a>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-4">
                <div class="mb-2 mb-md-0">
                    <h5 class="fs-18 mb-1"><a href="{{ route('landing.job.detail', $job->id) }}" class="text-dark">{{ $job->title }}</a>
                    </h5>
                    <p class="text-muted fs-14 mb-0">{{ $job->company_name }}</p>
                    <p class="text-muted fs-14 mb-0">{{ $job->category_name }}</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-2">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="mdi mdi-map-marker text-primary me-1"></i>
                    </div>
                    <p class="text-muted mb-0">{{ $job->placement }}</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-2">
                <div>
                    @foreach ($job->tags as $tag)
                    @php
                        $color = $colors[array_rand($colors)];
                    @endphp
                    <span class="badge bg-{{ $color }}-subtle text-{{ $color }} fs-13 mt-1">{{ $tag->name }}</span>
                    @endforeach
                    {{-- <p class="text-muted mb-2"><span class="text-primary">Rp. </span>{{ $job->sallary }}Jt/Bulan</p> --}}
                </div>
            </div>
            <!--end col-->
            <div class="col-md-1">
                <div>
                    <span class="badge bg-success-subtle text-success fs-13 mt-1">{{ $job->job_type }}</span>
                    {{-- <span class="badge bg-info-subtle text-info fs-13 mt-1">{{ $job->experience }}</span> --}}
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <div class="p-3 bg-light">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <p class="text-muted mb-0"><span class="text-dark">Pengalaman :</span> {{ $job->experience }}</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6 col-md-5">
                <div>
                    <p class="text-primary mb-0"><span class="text-dark">Penawaran :</span> Rp {{ $job->sallary }}Jt/Bulan</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-2 col-md-3">
                <div class="text-start text-md-end">
                    <a href="#applyNow" data-bs-toggle="modal" data-job_id="{{ $job->id }}" class="primary-link">Lamar <i
                            class="mdi mdi-chevron-double-right"></i></a>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end job-box-->