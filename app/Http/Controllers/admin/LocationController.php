<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('location.index', compact('locations'));
    }

    public function create()
    {
        return view('location.create');
    }

    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);
        Location::create($data);

        return to_route('location.index')->withSuccess('Updated Successfully');
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate(['name' => 'required']);
        $location->update($data);

        return to_route('location.index')->withSuccess('Updated Successfully');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return to_route('location.index')->withSuccess('Deleted Successfully');
    }
}
