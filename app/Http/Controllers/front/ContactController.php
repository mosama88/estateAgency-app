<?php

namespace App\Http\Controllers\front;

use App\Models\Contact;
use App\Models\Setting;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::all();
        return view('front.contact', compact('setting'));

    }


    public function about(){
        return view('front.about');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Contact $contact)
    {
        // $data = $request->validate([
        //     'name' => 'required|string|min:3|max:50',
        //     'email' => 'required|email|min:3|max:50',
        //     'subject' => 'required|string|min:10|max:100',
        //     'message' => 'required|string|min:20|max:500',
        // ],[
        //     'name.required'=>'حقل الاسم مطلوب.',
        //     'name.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
        //     'name.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
        //     'email.required'=>'حقل البريد الإلكتروني مطلوب.',
        //     'email.min'=>'يجب أن يتكون حقل الاسم من 3 أحرف على الأقل.',
        //     'email.max'=>'يجب ألا يزيد حقل الاسم عن 50 حرفًا.',
        //     'subject.required'=>'حقل الموضوع مطلوب.',
        //     'subject.min'=>'يجب أن يتكون حقل الاسم من 10 أحرف على الأقل.',
        //     'subject.max'=>'يجب ألا يزيد حقل الاسم عن 100 حرفًا.',
        //     'message.required'=>'حقل الرساله مطلوب.',
        //     'message.min'=>'يجب أن يتكون حقل الاسم من 20 أحرف على الأقل.',
        //     'message.max'=>'يجب ألا يزيد حقل الاسم عن 500 حرفًا.',
        // ]);

        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->subject = $request->subject;
        // $contact->message = $request->message;
        // $contact= new Contact();
        // $contact->create($data);
        // return back()->with('success', 'تم أستلام رسالتك سيتم التواصل معك فى أقرب وقت');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function sendMessage( Request $request)
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

        Mail::to('mosama@realstateagancy.com')->send(new ContactMail($data));

        $contact= new Contact();
        $contact->create($data);
        return back()->with('success', 'تم أستلام رسالتك سيتم التواصل معك فى أقرب وقت');
    }
}
