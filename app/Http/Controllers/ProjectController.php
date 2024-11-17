<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProject = Project::all();

        return view('project.index', compact('dataProject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'judul' => 'required|string',
            'responsibility' => 'required|string',
            'tgl_project' => 'required|date'
        ]);

        $project = new Project();
        $project -> judul = $request -> judul;
        $project -> responsibility = $request -> responsibility;
        $project -> tgl_project = $request -> tgl_project;
        $project -> save();

        return redirect() -> route('project.index') -> with('pesan', "project berhasil ditambahkan");
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
        $project = Project::find($id);
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'judul' => 'required|string',
            'responsibility' => 'required|string',
            'tgl_project' => 'required|date'
        ]);

        $project = Project::find($id);
        $project -> judul = $request -> judul;
        $project -> responsibility = $request -> responsibility;
        $project -> tgl_project = $request -> tgl_project;
        $project -> save();

        return redirect() -> route('project.index') -> with('pesan', "project {$id} berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project -> delete();

        return redirect() -> route('project.index') -> with('pesan', "project {$id} berhasil dihapus");
    }
}
