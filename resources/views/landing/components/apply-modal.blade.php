@php
    $me = CRUDBooster::me();
    $student = App\Models\StudentsModel::find($me->student_id);
@endphp
<div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <form action="{{ route('landing.apply') }}" method="post" enctype="multipart/form-data">
                    <div class="text-center mb-4">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            @if ($me->student_id)
                                @if($student->approved_job_apply_id) 
                                Anda aktif bekerja
                                @else
                                Lamar Pekerjaan
                                @endif
                            @elseif ($me)
                                Tidak dapat melamar
                            @else
                                Masuk untuk melamar
                            @endif
                        </h5>
                    </div>
                    <div class="position-absolute end-0 top-0 p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div {{ $me->student_id && !$student->approved_job_apply_id ? '' : 'hidden' }}>
                        @csrf
                        <div class="mb-3" hidden>
                            <label for="job_id" class="form-label">Job Id</label>
                            <input type="text" class="form-control" id="job_id" name="job_id" readonly required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="student_id" class="form-label">Job Id</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $me->student_id }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Nama</label>
                            <input type="text" class="form-control" style="background-color: var(--bs-gray-300)" id="student_name" name="student_name" value="{{ $me->name }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="resume_file">Upload Dokumen (CV)</label>
                            <input type="file" class="form-control" id="resume_file" name="resume_file" required>
                        </div>
                    </div>
                    
                    @if ($me->student_id)
                        @if($student->approved_job_apply_id) 
                        <p class="text-center">Hubungi admin jika anda telah berhenti berkerja.</p>
                        <a href="/admin" class="btn btn-primary w-100">Masuk</a>
                        @else
                        <button type="submit" class="btn btn-primary w-100">Kirim lamaran</button>
                        @endif
                    @elseif ($me)
                        <a href="/admin" class="btn btn-primary w-100">Masuk</a>
                    @else
                        <a href="/admin" class="btn btn-primary w-100">Masuk</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div><!-- END APPLY MODAL -->