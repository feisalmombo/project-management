<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Project;
use App\Task;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')
        ->latest()
        ->get();
        return view('project.projects')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->middleware(function ($request, $next) {
                if (\Auth::user()->can('create_project')) {
                    return $next($request);
                }
                return redirect()->back();
            });
            $this->validate(request(), [
                'project' => 'required|string',
            ]);

            $project_new = new Project;
            $project_new->project_name = $request->project;
            // return json_encode($project_new);
            $st = $project_new->save();
            if (!$st) {
                return redirect()->back()->with('message', 'Failed to insert Project data');
            }
            return redirect()->back()->with('message', 'Project is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_project =  Project::find($id);
        return view('project.edit')->with('edit_project', $edit_project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_project = Project::find($id);
        $update_project->project_name = $request->name;
        $update_project->save();
        Session::flash('message', 'Project was sucessfully edited');
        return redirect()->route('project.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_project = Project::find($id);
        $delete_project->delete();
        Session::flash('success', 'Project was deleted and tasks associated with it');
        return redirect()->back();
    }
}
