<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view("admin-panel.project.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin-panel.project.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "url" => "required",
        ]);
        $project = Project::create([
            "name" => $request->name,
            "url" => $request->url,
        ]);
        return redirect()->route("projects.index")->with("successMsg", "You have successfully created!");
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
        $project = Project::findOrFail($id);
        return view("admin-panel.project.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "name" => "required",
            "url" => "required",
        ]);
        $project = Project::findOrFail($id);
        $project->update([
            "name" => $request->name,
            "url" => $request->url,
        ]);
        return redirect()->route("projects.index")->with("successMsg", "You have successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::find($id)->delete();
        // return back()->->with("successMsg", "You have successfully deleted!");
        return redirect()->route("projects.index")->with("successMsg", "You have successfully deleted!");
    }
}