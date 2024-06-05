<?php

namespace App\Imports;

use App\Models\LevelStudiesModel;
use App\Models\ProgramStudiesModel;
use App\Models\StudentsModel;
use App\Models\UniversitiesModel;
use App\Repositories\CmsPrivileges;
use App\Repositories\CmsUsers;
use App\Repositories\Students;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $v = Validator::make($rows->toArray(), [
            '*.jenjang_pendidikan' => 'required|exists:level_studies,name',
            '*.jurusan' => 'required|exists:program_studies,name',
            '*.nim' => 'required|unique:students,nim',
            '*.ipk' => 'required|min:0|max:4',
            '*.email_mahasiswa' => 'required|unique:students,student_email',
            '*.email_pribadi' => 'required|unique:students,personal_email',
        ]);
        
        if ($v->fails()) {
            $error = $v->errors()->first();
            CRUDBooster::redirectBack($error, 'danger');
        }

        $previllege = CmsPrivileges::where('name', '=', 'Mahasiswa')->first();
        
        if(!$previllege) {
            CRUDBooster::redirectBack('Previllege was not set! contact your developer', 'danger');
        }

        foreach ($rows as $row) 
        {
            $level_study_id = LevelStudiesModel::where('name', '=', $row['jenjang_pendidikan'])->first()->id;
            $program_study_id = ProgramStudiesModel::where('name', '=', $row['jurusan'])->first()->id;
            
            
            $student = new Students();
            $student->university_id = UniversitiesModel::table()->first()->id;
            $student->level_study_id = $level_study_id;
            $student->program_study_id = $program_study_id;
            $student->nim = $row['nim'];
            $student->name = $row['nama'];
            $student->ipk = $row['ipk'];
            $student->student_email = $row['email_mahasiswa'];
            $student->personal_email = $row['email_pribadi'];
            $student->save();

            $user = new CmsUsers();
			$user->name = $row['nama'];
			$user->email = $row['email_mahasiswa'];
			$user->password = Hash::make($row['kata_sandi']);
			$user->id_cms_privileges = $previllege->id;
			$user->type = 'student';
			$user->student_id = $student->id;
			$user->save();
        }
    }

    public function headingRow(): int
    {
        return 3;
    }
}
