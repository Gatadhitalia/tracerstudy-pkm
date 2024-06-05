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
    {{-- <div class="row" style="padding-left: 1.5rem">
        <div class="col-12">
            <h5>Statistik Pelamar Pekerjaan</h5>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $student_count }}</h3>
                    <p>Jumlah Mahasiswa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('AdminStudentsControllerGetIndex') }}" class="small-box-footer">Lihat Table <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $company_count }}</h3>
                    <p>Jumlah Perusahaan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('AdminCompaniesControllerGetIndex') }}" class="small-box-footer">Lihat Table <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $job_count }}</h3>
                    <p>Jumlah Pekerjaan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('AdminJobsControllerGetIndex') }}" class="small-box-footer">Lihat Table <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $apply_count }}</h3>
                    <p>Jumlah Pelamar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('AdminCompaniesControllerGetIndex') }}" class="small-box-footer">Lihat Table <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12-col-xs-12" style="padding-left: 1.5rem;padding-right: 1.5rem;">
            <div class="box">
                <div class="box-body">
                    {!! $stats_per_day->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('bottom')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0-rc.1/dist/Chart.min.js"
        integrity="sha256-qJdfkTrvMTvYJwkeb1z9a+rOErkiTyqpDz5vi7lZ7MQ=" crossorigin="anonymous"></script>
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
