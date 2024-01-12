<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

if (! function_exists('getSearchParams')) {

    /**
     * Return search parameters
     *
     * @param $request
     * @return array/
     */
    function getSearchParams($request): array
    {
        $params =[];
        if($request->from) {
            $params['from'] = $request->from;
        }

        if($request->to) {
            $params['to'] = $request->to;
        }

        if($request->service_id){
            $params['service_id'] = $request->service_id;
        }

        if($request->status_id) {
            $params['status_id'] =  $request->status_id;
        }

        if($request->name) {
            $params['name'] = $request->name;
        }

        if($request->email) {
            $params['email'] = $request->email;
        }
        if($request->mobile) {
            $params['mobile'] =  '+88'.substr($request->mobile,-11,11);
        }

        return $params;

    }
}

if (! function_exists('generateTrackingNo')) {

    /**
     * Return search parameters
     *
     * @param $serviceId
     * @return string/
     */
    function generateTrackingNo($applicantCategoryId): string
    {
        $trackingPrefix = "101-".date("my")."-";
        if($applicantCategoryId == 2){
            $trackingPrefix = "202-".date("my")."-";
        }

        return DB::select("SELECT CONCAT('$trackingPrefix',LPAD(IFNULL(MAX(SUBSTR(table2.tracking_no,-6,6) )+1,1),6,'0')) AS tracking_no FROM (SELECT * FROM applicants ) AS table2 WHERE table2.tracking_no LIKE '$trackingPrefix%'")[0]->tracking_no;
    }
}

if (! function_exists('clearGarbageFiles')) {

    /**
     * Return bool
     *
     * @param $applicantId
     * @return bool/
     */
    function clearGarbageFiles($applicantId): bool
    {
        $applicant = Applicant::find($applicantId);
        $myDocuments = Document::where('applicant_id',$applicantId)
            ->whereNotNull('path')
            ->pluck('path')
            ->toArray();


        $documents = File::files(public_path('uploads/documents/'.$applicant->tracking_no));
        foreach ($documents as $key => $document) {
            $directoryFile = basename($document);
            if(!in_array($directoryFile,$myDocuments))
                array_map( 'unlink', array_filter((array) glob("uploads/documents/$applicant->tracking_no/$directoryFile")));
        }
        return true;
    }
}

if (! function_exists('storeFile')) {

    function storeFile($referencePath,$file){
        $directory = 'uploads';
        switch ($referencePath) {
            case 'services':
                $directory .= '/services/';
                break;
            case 'teams':
                $directory .= '/teams/';
                break;
            case 'testimonials':
                $directory .= '/testimonials/';
                break;
            case 'packages':
                $directory .= '/packages/';
                break;
            case 'blogs':
                $directory .= '/blogs/';
                break;
            case 'sliders':
                $directory .= '/sliders/';
                break;
            case 'addictions':
                $directory .= '/addictions/';
                break;
            case 'mental-healths':
                $directory .= '/mental-healths/';
                break;
            case 'appointments':
                $directory .= '/appointments/';
                break;
            case 'appearance':
                $directory .= '/appearance/';
                break;
            case 'about-us':
                $directory .= '/about-us/';
                break;
            case 'rehab-programme':
                $directory .= '/rehab-programme/';
                break;
            case 'gallery':
                $directory .= '/gallery/';
                break;
            default:
                $directory .= '/documents/';
        }


        if($file){
            $fileName = trim(str_replace('.','',uniqid($referencePath."_",true)).'.'.$file->getClientOriginalExtension());

            if(!file_exists($directory)){
                mkdir($directory,0777,true);
                $indexFile = fopen($directory . "/index.html", "w");
                fclose($indexFile);
            }

            $filePath = $directory . $fileName;

            if (move_uploaded_file($file->getPathname(), $filePath)) {
                return $fileName;
            } else {
                return false;
            }
        }

        return false;
    }
}


if (! function_exists('writeToLog')) {

    /**
     * Write custom messages to Log
     *
     * @param $exception
     * @param string $logType
     * @return \Illuminate\Config\Repository|mixed
     */
    function writeToLog($exception, $logType = 'error')
    {
        try {
            $logMessage = 'Error Message : '.$exception->getMessage().' Error File : '.$exception->getFile().' Error Line : '.$exception->getLine();
            $allLogTypes = ['alert', 'critical', 'debug', 'emergency', 'error', 'info','notice'];

            $logType = strtolower($logType);

            if (in_array($logType, $allLogTypes)) {
                \Log::$logType($logMessage);
            }
        } catch (Exception $e) {
            //
        }
    }
}

if (! function_exists('generateExcerpt')) {

    /**
     * Write custom messages to Log
     *
     * @param $exception
     * @param string $logType
     * @return \Illuminate\Config\Repository|mixed
     */
    function generateExcerpt($body, $limit = 100)
    {
        mb_internal_encoding("UTF-8");
        return mb_substr(strip_tags($body), 0, $limit);
    }
}
