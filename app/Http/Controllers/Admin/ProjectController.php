<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('dashboard.projects.add', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required| min:2| max:50| unique:projects,name',
            'location'=> 'required| min:5| max:50',
            'title'=> 'required|string|min:10|max:500',
            'description'=> 'required|string|min:10|max:2000',
            'image'=> 'required|image|mimes:jpg,jpeg,png,webp',
            'user_id'=> 'required|exists:users,id',

        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'location.required'=>'حقل الموقع مطلوب.',
            'location.min'=>'يجب أن يتكون حقل الموقع من 3 أحرف على الأقل.',
            'location.max'=>'يجب ألا يزيد حقل الموقع عن 50 حرفًا.',
        ]);

        $imageName  = $request->file('image')->store('project');
        $data['image'] = $imageName;
        Project::create($data);
        return redirect('projects')->with('success', 'تم أضافة المشروع بنجاح');
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
    public function edit( $id)
    {
        $users = User::get();
        $projects = Project::find($id);
      return view("dashboard.projects.edit", compact('projects', 'users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $projects, $id)
    {
        $projects = Project::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|min:3|'.Rule::unique('projects')->ignore($projects->id) ,
            'location'=> 'required| min:5| max:50',
            'user_id'=> 'required|exists:users,id',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'location.required'=>'حقل الموقع مطلوب.',
            'location.min'=>'يجب أن يتكون حقل الموقع من 3 أحرف على الأقل.',
            'location.max'=>'يجب ألا يزيد حقل الموقع عن 50 حرفًا.',
        ]);


        Project::where('id', $projects->id)->update($data);
        return redirect('projects')->with('success', 'تم تعديل المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Find the post by its ID
        $projects = Project::find($id);
         // Delete the post
        $projects->delete();

         // Return a response indicating success
        return back()->with('success', 'تم حذف مشروع '  . " " . $projects->name . " "  . "بنجاح" );
    }
}
