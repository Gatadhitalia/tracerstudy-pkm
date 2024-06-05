<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@push('head')
@endpush
@section('content')
    <div class="wrapper-ads" style="margin-bottom: 1.5rem!important; padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;">
        <a class="float-right" href="#" data-toggle="tooltip" data-placement="left" title="Hapus blok ini!" style="color: rgb(255, 255, 255); font-size: 20px;">×</a>
        <a href="https://dashboardpack.com/" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
            Ingin kembali ke halaman awal?
        </a>
        <a class="btn btn-default btn-sm" href="{{ url('/') }}" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">
            Klik disini!
        </a>
    </div>
   
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="box">
                <div class="box-body">
                    <div style="display: flex;align-content: center;align-items: center;justify-content: space-between;padding: 50px">
                        <div style="width: 40%">
                            @if($apply)
                            <h3>Pantau status lamaran anda</h3>
                            <p>Cek lamaran pekerjaan terakhir anda lebih mudah dengan klik disini.</p>
                            <a href="{{ route('AdminJobAppliesControllerGetIndex') }}"><button class="btn btn-sm btn-primary">Cek sekarang</button></a>
                            @else
                            <h3>Anda belum melakukan lamar pekerjaan</h3>
                            <p>Cari pekerjaan yang sesuai dengan minat anda dengan mudah melalui platform study tracer.</p>
                            <a href="{{ url('job') }}"><button class="btn btn-sm btn-primary">Cari pekerjaan sekarang</button></a>
                            @endif
                        </div>
                        <img src="https://preview.keenthemes.com/metronic8/demo11/assets/media/illustrations/sketchy-1/11.png" alt="" class="mw-200px mw-lg-350px mt-lg-n10" style="height: 250px">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            @if (count($jobs_suitable) > 0)
            <div class="box">
                <div class="box-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pekerjaan</th>
                                <th>Penempatan</th>
                                <th>Pengalaman</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs_suitable as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->placement }}</td>
                                    <td>{{ $job->experience }}</td>
                                    <td>
                                        <a href="{{ route('landing.job.detail', $job->id) }}">
                                            <button class="btn btn-success btn-sm">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            @if (count($jobs_suitable) === 0)
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <div class="card" >
                                <div class="card-body d-flex flex-column align-items-center justify-content-center" style="display:flex;align-items: center;flex-direction: column;">
                                    <h3 class="text-center">Oooops...</h3>
                                    <h4 class="mb-3 text-center">Tidak ditemukan pekerjaan terkait</h4>
                                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/illustrations/easy/1.svg" alt="" class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-12 col-xs-12" hidden>
            <div class="card card-xl-stretch bg-body border-0 mb-5 mb-xl-0">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column flex-lg-row flex-stack p-lg-15">  
                    <!--begin::Info-->
                    <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start me-10  text-center text-lg-start">
                        <!--begin::Title-->      
                        <h3 class="fs-2hx line-height-lg mb-5">
                            <span class="fw-bold">Brilliant App Ideas</span><br>
            
                            <span class="fw-bold">for Startups</span>
                        </h3>
                        <!--end::Title--> 
            
                        <div class="fs-4 text-muted mb-7">
                            Long before you sit down to put the pen<br>
                            need to make sure you breathe
                        </div>
            
                        <a href="#" class="btn btn-success fw-semibold px-6 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Create an Store</a> 
                    </div>
                    <!--end::Info-->
            
                    <!--begin::Illustration-->
                    <img src="https://preview.keenthemes.com/metronic8/demo11/assets/media/illustrations/sketchy-1/11.png" alt="" class="mw-200px mw-lg-350px mt-lg-n10">
                    <!--end::Illustration-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection
@push('bottom')
    <script>
        $(document).ready(function() {
            // alert('asd')
            $('.float-right').on('click', function(e) {
                e.preventDefault()
                $('.wrapper-ads').attr('style', 'display: none')
            })
        })
    </script>
@endpush
