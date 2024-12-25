<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExperienceDataTable;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExperienceDataTable $dataTable)
    {
        return $dataTable->render('admin.experience.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'start_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'end_year' => ['nullable'],
            'description' => ['nullable']
        ]);

        $experience = new Experience();
        $experience->title = $request->title;
        $experience->start_year = $request->start_year;
        $experience->end_year = $request->end_year;
        $experience->description = $request->description;
        $experience->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'start_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'end_year' => ['nullable'],
            'description' => ['nullable']
        ]);

        $experience = Experience::findOrFail($id);
        $experience->title = $request->title;
        $experience->start_year = $request->start_year;
        $experience->end_year = $request->end_year;
        $experience->description = $request->description;
        $experience->save();

        toastr('Update Successfully!', 'success');

        return redirect()->route('admin.experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
    }
}
