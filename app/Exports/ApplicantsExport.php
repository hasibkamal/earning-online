<?php

namespace App\Exports;

use App\Modules\Applicant\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicantsExport implements FromCollection, WithHeadings,WithMapping
{
    protected $params;
    public function __construct($request){
        $this->params = (array)json_decode($request->input('params'));
    }

    public function collection()
    {
        $query = Applicant::getApplicantReports($this->params);
        return $query->get([
            'applicants.*'
        ]);
    }

    public function headings():array{
        return[
            'tracking_no',
            'name',
            'email',
            'applicant_type',
            'mobile',
            'date_of_birth',
            'gender',
            'marital_status',
            'district',
            'address',
            'country',
            'ssc_olevel_technical_certificate',
            'ssc_olevel_technical_division_class_gpa',
            'ssc_olevel_technical_year',
            'ssc_olevel_technical_institute',
            'ssc_olevel_technical_board',
            'hsc_alevel_diploma_certificate',
            'hsc_alevel_diploma_division_class_gpa',
            'hsc_alevel_diploma_year',
            'hsc_alevel_diploma_institute',
            'hsc_alevel_diploma_board',
            'bachelor_degree_group_subject',
            'bachelor_degree_institute_university',
            'bachelor_degree_graduation_status',
            'bachelor_degree_semester',
            'bachelor_degree_division_class_gpa',
            'bachelor_degree_year',
            'master_degree_group_subject',
            'master_degree_institute_university',
            'master_degree_graduation_status',
            'master_degree_semester',
            'master_degree_division_class_gpa',
            'master_degree_year',
            'english_language_test_name',
            'english_language_test_score',
            'english_language_test_year',
            'testimonials_other_course',
            'interested_country',
            'embassy_appointment_date',
            'embassy_appointment_rescheduled_at'
        ];
    }

    public function map($applicant): array
    {
        return [
            $applicant->tracking_no,
            $applicant->name,
            $applicant->email,
            $applicant->applicant_type,
            $applicant->mobile,
            $applicant->date_of_birth,
            $applicant->gender,
            $applicant->marital_status,
            $applicant->district,
            $applicant->address,
            $applicant->country,
            $applicant->ssc_olevel_technical_certificate,
            $applicant->ssc_olevel_technical_division_class_gpa,
            $applicant->ssc_olevel_technical_year,
            $applicant->ssc_olevel_technical_institute,
            $applicant->ssc_olevel_technical_board,
            $applicant->hsc_alevel_diploma_certificate,
            $applicant->hsc_alevel_diploma_division_class_gpa,
            $applicant->hsc_alevel_diploma_year,
            $applicant->hsc_alevel_diploma_institute,
            $applicant->hsc_alevel_diploma_board,
            $applicant->bachelor_degree_group_subject,
            $applicant->bachelor_degree_institute_university,
            $applicant->bachelor_degree_graduation_status,
            $applicant->bachelor_degree_semester,
            $applicant->bachelor_degree_division_class_gpa,
            $applicant->bachelor_degree_year,
            $applicant->master_degree_group_subject,
            $applicant->master_degree_institute_university,
            $applicant->master_degree_graduation_status,
            $applicant->master_degree_semester,
            $applicant->master_degree_division_class_gpa,
            $applicant->master_degree_year,
            $applicant->english_language_test_name,
            $applicant->english_language_test_score,
            $applicant->english_language_test_year,
            $applicant->testimonials_other_course,
            $applicant->interested_country,
            $applicant->embassy_appointment_date,
            $applicant->embassy_appointment_rescheduled_at
        ];
    }
}
