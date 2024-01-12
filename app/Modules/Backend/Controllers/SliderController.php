<?php

namespace App\Modules\Backend\Controllers;

use App\DataTables\Backend\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\Backend\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render("Backend::sliders.index");
    }

    public function create()
    {
        return view("Backend::sliders.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
//            'name'          => 'required',
            'image'         => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
//            'title'         => 'required',
//            'description'   => 'required',
            'status'        => 'required'
        ]);

        $slider = new Slider();
        $slider->name    = $request->input('name');
        $slider->title  = $request->input('title');
        $slider->description  = $request->input('description');
        $slider->ordering   = $request->input('ordering');
        $slider->status   = $request->input('status');
        if($request->hasFile('image')){
           $slider->image   = storeFile('sliders',$request->file('image'));
        }
        $slider->save();
        return redirect(route('admin.sliders.index'))->with('flash_success', 'Slider created successfully.');
    }

    public function show($sliderId)
    {
        $decodedId = Encryption::decodeId($sliderId);
        $data['slider'] = Slider::find($decodedId);
        return view("Backend::sliders.show", $data);
    }

    public function edit($sliderId)
    {
        $decodedId = Encryption::decodeId($sliderId);
        $data['slider'] = Slider::find($decodedId);
        return view("Backend::sliders.edit", $data);
    }

    public function update(Request $request, $sliderId)
    {
        $decodedId = Encryption::decodeId($sliderId);
        $this->validate($request, [
//            'name'          => 'required',
            'image'         => 'sometimes|mimes:jpeg,jpg,png,svg|max:1024',
//            'title'         => 'required',
//            'description'   => 'required',
            'status'        => 'required'
        ]);

        $slider                = Slider::find($decodedId);
        $slider->name          = $request->input('name');
        $slider->title          = $request->input('title');
        $slider->description   = $request->input('description');
        $slider->ordering      = $request->input('ordering');
        $slider->status        = $request->input('status');
        if($request->hasFile('image')){
            $slider->image     = storeFile('sliders',$request->file('image'));
        }
        $slider->save();

        return redirect(route('admin.sliders.index'))->with('flash_success', 'Slider updated successfully.');
    }

    public function delete($sliderId)
    {
        $decodedId = Encryption::decodeId($sliderId);
        $slider = Slider::find($decodedId);
        $slider->is_archive = 1;
        $slider->deleted_at = Carbon::now();
        $slider->deleted_by = auth()->user()->id ?? null;
        $slider->save();
        session()->flash('flash_success', 'Slider deleted successfully!');
    }
}
