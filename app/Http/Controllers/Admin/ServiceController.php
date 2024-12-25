<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.service.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'content' => ['nullable']
        ]);

        $service = Service::create($validated);

        toastr()->success('Created Successfully', 'Congrats');

        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('frontend.pages.service.detail', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'content' => ['nullable']
        ]);

        $service = Service::findOrFail($id);
//        if (strcmp($validated['name'], $service->name))
        $validated['slug'] = '';
        $service->update($validated);

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    }
}
