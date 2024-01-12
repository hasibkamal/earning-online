<?php

namespace App\Modules\Backend\Controllers;

use App\DataTables\Backend\ContactUsDataTable;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\Backend\Models\ContactUs;
use Carbon\Carbon;


class ContactUsController extends Controller
{
    public function index(ContactUsDataTable $dataTable)
    {
        return $dataTable->render("Backend::contact-us.index");
    }

    public function show($contactUsId)
    {
        $decodedId = Encryption::decodeId($contactUsId);
        $data['contactUs'] = ContactUs::find($decodedId);
        return view("Backend::contact-us.show", $data);
    }

    public function delete($contactUsId)
    {
        $decodedId = Encryption::decodeId($contactUsId);
        $contactUs = ContactUs::find($decodedId);
        $contactUs->is_archive = 1;
        $contactUs->deleted_at = Carbon::now();
        $contactUs->deleted_by = auth()->user()->id ?? null;
        $contactUs->save();
        session()->flash('flash_success', 'ContactUs deleted successfully!');
    }
}
