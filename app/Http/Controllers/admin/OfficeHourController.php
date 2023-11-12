<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeHour;
use Illuminate\Http\Request;

class OfficeHourController extends Controller
{
    public function index()
    {
        $officeHours = OfficeHour::all();
        return view('office-hour.index', compact('officeHours'));
    }

    public function create()
    {
        return view('office-hour.create');
    }

    public function edit(OfficeHour $officeHour)
    {
        return view('office-hour.edit', compact('officeHour'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['description' => 'required']);
        OfficeHour::create($data);
        return to_route('officeHour.index')->withSuccess('Updated Successfully');
    }

    public function update(Request $request, OfficeHour $officeHour)
    {
        $data = $request->validate(['description' => 'required']);
        $officeHour->update($data);
        return to_route('officeHour.index')->withSuccess('Updated Successfully');
    }

    public function destroy(OfficeHour $officeHour)
    {
        $officeHour->delete();
        return to_route('officeHour.index')->withSuccess('Deleted Successfully');
    }
}
