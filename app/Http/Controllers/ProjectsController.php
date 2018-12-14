<?php

namespace App\Http\Controllers;

use App\Project;
use App\Comment;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('projects.index' , ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        //
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }

        return view("projects.create" , [
            'company_id' => $company_id,
            'companies' => $companies
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $project = '';
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
        }

        if($project){
            return redirect()->route('companies.show' , ['company' => $request->input('company_id') ] )
            ->with('success', 'project create successfully ');
        }


        return back()->withInput()->with('error' , 'Error creating new project');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
        // $project = Project::find($project->id);
        $project = Project::where('id' , $project->id)->first();
        $comment = Comment::where([
            ['commentable_type' , 'Project'],
            ['commentable_id' ,$project->id]
        ])->get();

        return view("projects.show" , [
            'project' => $project,
            'comments' => $comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
        $project = Project::where('id' , $project->id)->first();

        return view("projects.edit" , ["project" => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //
        $projectUpdate = Project::where('id' , $project->id)
        ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if($projectUpdate){
            return redirect()->route('projects.show', ['project' => $project->id])
            ->with('success' , 'project updated successfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
        $findproject = Project::where('id' , $project->id)->first();
        if($findproject->delete()){
            return redirect()->route('projects.index')
            ->with('success', 'project deleted successfully');
        }

        return back()->withInput()->with('error' , 'project could not be deleted');
    }
}
