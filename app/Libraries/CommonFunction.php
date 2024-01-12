<?php

namespace App\Libraries;


use App\Modules\Backend\Models\Appearance;
use App\Modules\Backend\Models\Blog;
use App\Modules\Backend\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mpdf\Mpdf;

class CommonFunction {

    public static function getUserId() {
        return Auth::user()->id ?? 0;
    }

    public static function getUserType() {

        if (Auth::user()) {
            return Auth::user()->user_type ?? null;
        } else {
            dd('Invalid User Type');
        }
    }




    public static function convertUTF8($string) {
        $string = preg_replace('/u([0-9a-fA-F]+)/', '&#x$1;', $string);
        return html_entity_decode($string, ENT_COMPAT, 'UTF-8');
    }

    public static function isAdmin() {
        $user_type = Auth::user()->user_type ?? null;
        /*
         * 1x101 for System Admin
         */
        if ($user_type == '1x101')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function convert2Bangla($eng_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['à§¦', 'à§§', 'à§¨', 'à§©', 'à§ª', 'à§«', 'à§¬', 'à§­', 'à§®', 'à§¯'];
        return str_replace($eng, $ban, $eng_number);
    }

    public static function convert2English($ban_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['à§¦', 'à§§', 'à§¨', 'à§©', 'à§ª', 'à§«', 'à§¬', 'à§­', 'à§®', 'à§¯'];
        return str_replace($ban, $eng, $ban_number);
    }

    public static function generateTrackingID($prefix, $id) {
        $prefix = strtoupper($prefix);
        $str = $id . date('Y') . mt_rand(0, 9);
        if ($prefix == 'M' || $prefix == 'N') {
            if (strlen($str) > 12) {
                $str = substr($str, strlen($str) - 12);
            }
        } elseif ($prefix == 'G') {
            if (strlen($str) > 10) {
                $str = substr($str, strlen($str) - 10);
            }
        } elseif ($prefix == 'T') {
            if (strlen($str) > 12) {
                $str = substr($str, strlen($str) - 12);
            }
        } else {
            if (strlen($str) > 14) {
                $str = substr($str, strlen($str) - 14);
            }
        }
        return $prefix . dechex($str);
    }


    public static function setCompanyInfo(){

        $companyInfo = cache('companyInfo',function(){
            $appearance = Appearance::where('appearance.is_archive',0)->first();
            cache()->put('companyInfo',$appearance);
            return $appearance;
        });

        $data = [
            'company_name'          => $companyInfo->name ?? env('APP_NAME','Application'),
            'company_admin_name'    => $companyInfo->admin_name ?? 'Admin',
            'company_description'   => $companyInfo->description ?? null,
            'company_logo'          => $companyInfo->logo ?? null,
            'company_website'       => $companyInfo->website ?? null,
            'company_address'       => $companyInfo->address ?? null,
            'chairman_name'         => $companyInfo->chairman_name ?? null,
            'chairman_message'      => $companyInfo->chairman_message ?? null,
            'chairman_photo'        => $companyInfo->chairman_photo ?? null,
            'company_email'         => $companyInfo->email ?? null,
            'company_phone'         => $companyInfo->phone ?? null,
            'facebook_link'         => $companyInfo->facebook ?? 'https://www.facebook.com',
            'twitter_link'          => $companyInfo->twitter ?? 'https://www.twitter.com',
            'instagram_link'        => $companyInfo->instagram ?? 'https://www.instagram.com',
            'linkedin_link'         => $companyInfo->linkedin ?? 'https://www.linkedin.com',
            'pinterest_link'        => $companyInfo->pinterest ?? 'https://www.pinterest.com',
            'google_plus_link'      => $companyInfo->google_plus ?? null,
            'youtube_link'          => $companyInfo->youtube ?? 'https://www.youtube.com',
            'opening_hours'         => [
                'saturday' => $companyInfo->saturday ?? null,
                'sunday' => $companyInfo->sunday ?? null,
                'monday' => $companyInfo->monday ?? null,
                'tuesday' => $companyInfo->tuesday ?? null,
                'wednesday' => $companyInfo->wednesday ?? null,
                'thursday' => $companyInfo->thursday ?? null,
                'friday' => $companyInfo->friday ?? null,
            ],
        ];


//        if(session()->has('company.recent_posts')){
//            $data['recent_posts'] = session()->get('company.recent_posts');
//        }else{
//            $data['recent_posts'] = Blog::where('blogs.status',1)
//                ->where('blogs.is_archive',0)
//                ->limit(5)
//                ->get([
//                    'title',
//                    'image',
//                    'created_at'
//                ])->toArray();
//        }

        Session::put('company', $data);
    }

    public static function generatePDF($pdf){

        if(!isset($pdf['bookmark'])) $pdf['bookmark'] = 'PDF Bookmark';
        if(!isset($pdf['title'])) $pdf['title'] = 'PDF Title';
        if(!isset($pdf['subject'])) $pdf['subject'] = 'PDF Subject';
        if(!isset($pdf['author'])) $pdf['author'] = 'Author';
        if(!isset($pdf['stylesheet'])) $pdf['stylesheet'] = file_get_contents('assets/backend/dist/css/pdf.css');
        if(!isset($pdf['html'])) $pdf['html'] = '';
        if(!isset($pdf['output'])) $pdf['output'] = 'I';

        $mPDF = new mPDF([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mPDF->Bookmark($pdf['bookmark']);
        $mPDF->SetTitle($pdf['title']);
        $mPDF->SetSubject($pdf['subject']);
        $mPDF->SetAuthor($pdf['author']);
        $mPDF->SetDisplayMode('fullwidth');
        $mPDF->setFooter('{PAGENO} / {nb}');
        $mPDF->WriteHTML($pdf['stylesheet'], 1);
        $mPDF->WriteHTML($pdf['html'], 2);
        return $mPDF->Output($pdf['subject'] . '.pdf', $pdf['output']);
    }

    /*     * ****************************End of Class***************************** */
}
