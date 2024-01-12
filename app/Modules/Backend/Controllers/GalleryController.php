<?php

namespace App\Modules\Backend\Controllers;

use App\DataTables\Backend\GalleryDataTable;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\Backend\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function index(GalleryDataTable $dataTable)
    {
        return $dataTable->render("Backend::gallery.index");
    }

    public function create()
    {
        return view("Backend::gallery.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'status'    => 'required'
        ]);

        $gallery = new Gallery();
        $gallery->title    = $request->input('title');
        $gallery->ordering   = $request->input('ordering');
        $gallery->status   = $request->input('status');
        if($request->hasFile('image')){
           $gallery->image   = storeFile('gallery',$request->file('image'));
        }
        $gallery->save();
        return redirect(route('admin.gallery.index'))->with('flash_success', 'Gallery created successfully.');
    }

    public function show($galleryId)
    {
        $decodedId = Encryption::decodeId($galleryId);
        $data['gallery'] = Gallery::find($decodedId);
        return view("Backend::gallery.show", $data);
    }

    public function edit($galleryId)
    {
        $decodedId = Encryption::decodeId($galleryId);
        $data['gallery'] = Gallery::find($decodedId);
        return view("Backend::gallery.edit", $data);
    }

    public function update(Request $request, $galleryId)
    {
        $decodedId = Encryption::decodeId($galleryId);
        $this->validate($request, [
            'title'         => 'required',
            'image'         => 'sometimes|mimes:jpeg,jpg,png,svg|max:1024',
            'status'        => 'required'
        ]);

        $gallery                = Gallery::find($decodedId);
        $gallery->title          = $request->input('title');
        $gallery->ordering      = $request->input('ordering');
        $gallery->status        = $request->input('status');
        if($request->hasFile('image')){
            $gallery->image     = storeFile('gallery',$request->file('image'));
        }
        $gallery->save();

        return redirect(route('admin.gallery.index'))->with('flash_success', 'Gallery updated successfully.');
    }

    public function delete($galleryId)
    {
        $decodedId = Encryption::decodeId($galleryId);
        $gallery = Gallery::find($decodedId);
        $gallery->is_archive = 1;
        $gallery->deleted_at = Carbon::now();
        $gallery->deleted_by = auth()->user()->id ?? null;
        $gallery->save();
        session()->flash('flash_success', 'Gallery deleted successfully!');
    }
}
