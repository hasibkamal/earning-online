<?php

namespace App\Modules\Backend\Controllers;

use App\DataTables\Backend\PlanDataTable;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\Backend\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PlanController extends Controller
{
    public function index(PlanDataTable $dataTable)
    {
        return $dataTable->render("Backend::plans.index");
    }

    public function create()
    {
        return view("Backend::plans.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => ['required', Rule::unique('plans')->where(function ($query) {  $query->whereNull('deleted_at');})],
            'price'         => 'required',
            'expiry_days'   => 'required',
            'daily_limit'   => 'required',
            'status'        => 'required'
        ]);

        $plan = new Plan();
        $plan->name    = $request->input('name');
        $plan->price  = $request->input('price');
        $plan->expiry_days  = $request->input('expiry_days');
        $plan->daily_limit   = $request->input('daily_limit');
        $plan->status   = $request->input('status');
        $plan->save();
        return redirect(route('admin.plans.index'))->with('flash_success', 'Plan created successfully.');
    }

    public function show($planId)
    {
        $decodedId = Encryption::decodeId($planId);
        $data['plan'] = Plan::find($decodedId);
        return view("Backend::plans.show", $data);
    }

    public function edit($planId)
    {
        $decodedId = Encryption::decodeId($planId);
        $data['plan'] = Plan::find($decodedId);
        return view("Backend::plans.edit", $data);
    }

    public function update(Request $request, $planId)
    {
        $decodedId = Encryption::decodeId($planId);
        $this->validate($request, [
            'name'          => ['required', Rule::unique('plans')->ignore($decodedId)->where(function ($query){$query->whereNull('deleted_at');})],
            'image'         => 'sometimes|mimes:jpeg,jpg,png,svg|max:1024',
            'description'   => 'required',
            'status'        => 'required'
        ]);

        $plan = Plan::find($decodedId);
        $plan->name = $request->input('name');
        $plan->price = $request->input('price');
        $plan->expiry_days = $request->input('expiry_days');
        $plan->daily_limit = $request->input('daily_limit');
        $plan->status = $request->input('status');
        $plan->save();

        return redirect(route('admin.plans.index'))->with('flash_success', 'Plan updated successfully.');
    }

    public function delete($planId)
    {
        $decodedId = Encryption::decodeId($planId);
        $plan = Plan::find($decodedId);
        $plan->is_archive = 1;
        $plan->deleted_at = Carbon::now();
        $plan->deleted_by = auth()->user()->id ?? null;
        $plan->save();
        session()->flash('flash_success', 'Plan deleted successfully!');
    }
}
