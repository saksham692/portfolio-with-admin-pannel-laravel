<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EducationDataTable;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EducationDataTable $dataTable)
    {
        return $dataTable->render('admin.education.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'institute_name' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'start_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'end_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'description' => ['nullable']
        ]);

        $education = new Education();
        $education->institute_name = $request->institute_name;
        $education->degree = $request->degree;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->description = $request->description;
        $education->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.education.index');
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
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'institute_name' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'start_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'end_year' => ['required', 'regex:/^[0-9]{4}$/'],
            'description' => ['nullable']
        ]);

        $education = Education::findOrFail($id);
        $education->institute_name = $request->institute_name;
        $education->degree = $request->degree;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->description = $request->description;
        $education->save();

        toastr('Update Successfully!', 'success');

        return redirect()->route('admin.education.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
    }
}
