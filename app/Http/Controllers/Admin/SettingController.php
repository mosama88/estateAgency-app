<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::paginate(5);
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string|min:8|max:12',
            'address'=>'required|string|min:8|max:200',
            'description'=>'required|string|min:8|max:1500',
            'facebook'=>'required|string|min:8|max:50',
            'instgram'=>'required|string|min:8|max:50',
            'linkedin'=>'required|string|min:8|max:50',
            'twitter'=>'required|string|min:8|max:50',
        ]);

         Setting::create($data);
        return redirect('settings')->with('success', 'تم أضافة الإعدادات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }


    public function footer()
    {
        $setting = Setting::get();
        return view('components.footer-setting', compact("setting"));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);

        return view('dashboard.settings.edit', compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string|min:8|max:12',
            'address'=>'required|string|min:8|max:200',
            'description'=>'required|string|min:8|max:1500',
            'facebook'=>'required|string|min:8|max:50',
            'instgram'=>'required|string|min:8|max:50',
            'linkedin'=>'required|string|min:8|max:50',
            'twitter'=>'required|string|min:8|max:50',
        ]);
        $setting = Setting::findOrFail($id);
        Setting::where('id', $setting->id)->update($data);
        return redirect('settings')->with('success', 'تم تعديل الإعدادات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Find the post by its ID
        $setting = Setting::find($id);
         // Delete the post
        $setting->delete();

         // Return a response indicating success
        return back()->with('success', 'تم حذف الأعدادت بنجاح');
    }
}
