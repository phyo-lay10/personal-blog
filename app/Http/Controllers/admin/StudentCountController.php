<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCount;
use Illuminate\Http\Request;

class StudentCountController extends Controller
{
    public function index()
    {
        $studentCounts = StudentCount::all();
        $student = StudentCount::find(1);
        return view("admin-panel.student-count.index", compact("studentCounts", "student"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "count" => "required",
        ]);
        // StudentCount::create($request->all());
        $studentCount = StudentCount::create([
            "count" => $request->count,
        ]);
        return back()->with("successMsg", "You have successfully created!");
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "count" => "required",
        ]);
        $student = StudentCount::find($id);
        $student->update([
            "count" => $request->count + $student->count,
        ]);
        return back();
    }
}