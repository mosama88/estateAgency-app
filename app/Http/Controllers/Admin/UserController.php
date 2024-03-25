<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard.users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();
        $projects = Project::get();
        return view('dashboard.users.add', compact('departments', 'projects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string| min:3| max:50',
            'email'=> 'required|email|min:5| max:50| unique:users,email',
            'password'=> 'required|string|min:5| max:50',
            'phone'=> 'required| min:8|string|max:20',
            'type' => 'required|in:admin,user',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
            'department_id'=> 'required|exists:departments,id',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'email.required'=>'حقل البريد الالكترونى مطلوب.',
            'email.min'=>'يجب أن يتكون حقل البريد الالكترونى من 5 أحرف على الأقل.',
            'email.max'=>'يجب ألا يزيد حقل البريد الالكترونى عن 50 حرفًا.',
            'password.required'=>'حقل كلمة المرور مطلوب.',
            'password.min'=>'يجب أن يتكون حقل كلمة المرور من 5 أحرف على الأقل.',
            'password.max'=>'يجب ألا يزيد حقل كلمة المرور عن 50 حرفًا.',
            'phone.required'=>'حقل الموبايل مطلوب.',
            'phone.min'=>'يجب أن يتكون حقل الموبايل من8 أحرف على الأقل.',
            'phone.max'=>'يجب ألا يزيد حقل الموبايل عن 20 حرفًا.',
            'department_id.required'=>'حقل القسم مطلوب.',
        ]);
        
        $image_name = $request->file('image')->store('userImage');
        $data['image'] = $image_name;

        User::create($data);
        return redirect('users')->with('success', 'تم أضافة الموظف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $departments = Department::get();
        $projects = Project::get();
        $users = User::find($id);
      return view("dashboard.users.edit", compact('users', 'departments', 'projects'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users, $id)
    {
        $users = User::findOrFail($id);
        
        $data = $request->validate([
            'name'=> 'required|string| min:3| max:50',
            'email' => 'required|email|min:3|'.Rule::unique('users')->ignore($users->id) ,
            'password'=> 'required|string|min:5| max:50',
            'phone'=> 'required| min:8|string|max:20',
            'type' => 'required|in:admin,user',
            'department_id'=> 'required|exists:departments,id',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'email.min'=>'يجب أن يتكون حقل البريد الالكترونى من 5 أحرف على الأقل.',
            'email.max'=>'يجب ألا يزيد حقل البريد الالكترونى عن 50 حرفًا.',
            'password.required'=>'حقل كلمة المرور مطلوب.',
            'password.min'=>'يجب أن يتكون حقل كلمة المرور من 5 أحرف على الأقل.',
            'password.max'=>'يجب ألا يزيد حقل كلمة المرور عن 50 حرفًا.',
            'phone.required'=>'حقل الموبايل مطلوب.',
            'phone.min'=>'يجب أن يتكون حقل الموبايل من8 أحرف على الأقل.',
            'phone.max'=>'يجب ألا يزيد حقل الموبايل عن 20 حرفًا.',
            'department_id.required'=>'حقل القسم مطلوب.',
        ]);
        $old_image = $users->image;

        if($request->hasFile('image')){
            $new_image = $request->file('image')->store('userImage');
            File::delete($old_image);
            $users->image = $new_image;
            $users->save();
        }





        User::where('id', $users->id)->update($data);
        return redirect('users')->with('success', 'تم تعديل بيانات الموظف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Find the post by its ID
        $users = User::find($id);
         // Delete the post
        $users->delete();

         // Return a response indicating success
        return back()->with('success', 'تم حذف الموظف بنجاح');
    }

    public function search(Request $request){
        $search = $request->search;
        $user = User::where(function($query) use ($search){
            $query->where('name', 'like', "%$search%")->orwhere('type', 'like', "%$search%");
        })
        ->orWhereHas('department', function($query) use ($search){
            $query->where('name', 'like', "%$search%");
        })
        ->paginate(5);
        return view('dashboard.users.search', compact('search','user'));
    }

}
