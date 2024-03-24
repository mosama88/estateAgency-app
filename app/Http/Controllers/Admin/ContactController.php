<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at','desc')->paginate(5);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.contacts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:3|max:50',
            'subject' => 'required|string|min:10|max:100',
            'message' => 'required|string|min:20|max:500',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'email.required'=>'حقل البريد الإلكتروني مطلوب.',
            'email.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'email.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'subject.required'=>'حقل الموضوع مطلوب.',
            'subject.min'=>'يجب أن يتكون حقل الاسم من 10 أحرف على الأقل.',
            'subject.max'=>'يجب ألا يزيد حقل الاسم عن 100 حرفًا.',
            'message.required'=>'حقل الرساله مطلوب.',
            'message.min'=>'يجب أن يتكون حقل الاسم من 20 أحرف على الأقل.',
            'message.max'=>'يجب ألا يزيد حقل الاسم عن 500 حرفًا.',
        ]);

        Contact::create($data);
        return redirect('contact')->with('success','تم أضافة جهه أتصال');
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
        $contact = Contact::findOrFail($id);
        return view('dashboard.contacts.edit' ,compact('contact'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:3|max:50',
            'subject' => 'required|string|min:10|max:100',
            'message' => 'required|string|min:20|max:500',
        ],[
            'name.required'=>'حقل الاسم مطلوب.',
            'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'email.required'=>'حقل البريد الإلكتروني مطلوب.',
            'email.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
            'email.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
            'subject.required'=>'حقل الموضوع مطلوب.',
            'subject.min'=>'يجب أن يتكون حقل الاسم من 10 أحرف على الأقل.',
            'subject.max'=>'يجب ألا يزيد حقل الاسم عن 100 حرفًا.',
            'message.required'=>'حقل الرساله مطلوب.',
            'message.min'=>'يجب أن يتكون حقل الاسم من 20 أحرف على الأقل.',
            'message.max'=>'يجب ألا يزيد حقل الاسم عن 500 حرفًا.',
        ]);
        $contact = Contact::findOrFail($id);
        Contact::where('id',$contact->id)->update($data);
        return redirect('contact')->with('success', 'تم تعديل ملعومات الاتصال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return back()->with('success', 'تم حذف معلومات الاتصال بنجاح');
    }
}
