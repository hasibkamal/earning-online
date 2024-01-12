<?php

namespace App\Exports;

use App\Modules\Applicant\Models\Applicant;
use App\Modules\Application\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationsExport implements FromCollection, WithHeadings,WithMapping
{
    protected $params;
    public function __construct($request){
        $this->params = (array)json_decode($request->input('params'));
    }

    public function collection()
    {
        $query = Application::getApplicationReports($this->params);
        return $query->get([
            'applications.*',
            'process_status.status_name',
            'countries.name as country_name',
            'universities.name as university_name',
        ]);
    }

    public function headings():array{
        return[
            "application_date",
            "country",
            "university",
            "application_status",
            "semester_intake_date",
            "course_name",
            "purpose",
            "appointment_date",
            "deferred"
        ];
    }

    public function map($application): array
    {
        return [
            $application->application_date,
            $application->country_name,
            $application->university_name,
            $application->status_name,
            $application->semester_intake_date,
            $application->course_name,
            $application->purpose,
            $application->appointment_date,
            $application->is_deferred ? 'Yes' : 'No',
        ];
    }
}
