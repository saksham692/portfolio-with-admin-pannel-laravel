<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.project.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail_img' => ['required'],
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500']
        ]);
        $imagePath = handleUpload('thumbnail_img');
        $project = new Project();
        $project->thumbnail_img = $imagePath;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        toastr()->success('Created Successfully', 'Congrats');

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('frontend.pages.project.detail', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail_img' => ['image'],
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500']
        ]);

        $project = Project::findOrFail($id);
        $imagePath = handleUpload('thumbnail_img', $project);
        $project->thumbnail_img = (!empty($imagePath) ? $imagePath : $project->thumbnail_img);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
    }
}
