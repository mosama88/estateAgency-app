<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $departments = Department::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.departments.index',compact('departments'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.departments.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required| min:2| max:50| unique:departments,name',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'name:unique'=> 'أسم القسم موجود بالفعل',
        ]);
        

        Department::create($data);
        return redirect('departments')->with('success', 'تم أضافة القسم بنجاح');
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
        $departments = Department::find($id);
      return view("dashboard.departments.edit", compact('departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $departments, $id)
    {
        $data = $request->validate([
            'name'=> 'required| min:2| max:50| unique:departments,name',
        ]);

        $departments = Department::findOrFail($id);
        Department::where('id', $departments->id)->update($data);
        return redirect('departments')->with('success', 'تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Find the post by its ID
        $deparments = Department::find($id);
         // Delete the post
        $deparments->delete();

         // Return a response indicating success
        return back()->with('success', 'تم حذف القسم بنجاح');
    }


    public function search(Request $request)
{

    $search = $request->input('search');
    $results = Department::where('name', 'like', "%$search%")->get();

    return view('dashboard.departments.search', ['results' => $results]);
}


}
