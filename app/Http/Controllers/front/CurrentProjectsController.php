<?php

namespace App\Http\Controllers\front;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrentProjectsController extends Controller
{
    public function index(){

        $projects = Project::paginate(6);
        return view ('front.CurrentProjects', compact('projects'));
    }


    public function show($id){

        $projects = Project::find($id);
        return view ('front.project-single', compact('projects'));
    }

}
