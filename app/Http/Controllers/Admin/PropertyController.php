<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        $properties = Property::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.properties.index',compact('properties','projects'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $project = Project::get();
        return view('dashboard.properties.add', compact('project','users'));

    }

    /**
     * Store a newly created resource in storage.
     */


    //  details	hall	space	room	Baths	Kitchen	image_1	image_2	image_3	type	status	project_id	created_at	updated_at
    public function store(Request $request, Property $property)
    {
        $data = $request->validate([
            'title'=> 'required|string| min:10| max:100',
            'address'=> 'required|string| min:20| max:300',
            'details'=> 'required|string|min:20| max:1500',
            'price'=> 'required|string| min:1| max:10',
            'floor'=> 'required|string| min:1| max:2',
            'hall'=> 'required|string| min:1| max:3',
            'space'=> 'required|string| min:1| max:3',
            'room'=> 'required|string| min:1| max:3',
            'Baths'=> 'required|string| min:1| max:3',
            'Kitchen'=> 'required|string| min:1| max:3',
            'image_1'=> 'required|image| mimes:jpg,png,gif,jpeg,webp',
            'image_2'=> 'required|image| mimes:jpg,png,gif,jpeg,webp',
            'image_3'=> 'required|image| mimes:jpg,png,gif,jpeg,webp',
            'type' => 'required|in:villa,Apartment',
            'status'=> 'required|in:sell,rent',
            'project_id'=> 'required|exists:projects,id',
            'user_id'=> 'required|exists:users,id'
        ]);

        $image_1_name = $request->file('image_1')->store('property');
        $image_2_name = $request->file('image_2')->store('property');
        $image_3_name = $request->file('image_3')->store('property');
        $property->details = $request->details;
        $property->title = $request->title;
        $property->address = $request->address;
        $property->price = $request->price;
        $property->floor = $request->floor;
        $property->hall = $request->hall;
        $property->space = $request->space;
        $property->room = $request->room;
        $property->Baths = $request->Baths;
        $property->Kitchen = $request->Kitchen;
        $property->image_1 = $request->image_1;
        $property->image_2 = $request->image_2;
        $property->image_3 = $request->image_3;
        $property->type = $request->type;
        $property->status = $request->status;
        $property->project_id = $request->project_id;
        $property->user_id = $request->user_id;
        $data['image_1'] = $image_1_name;
        $data['image_2'] = $image_2_name;
        $data['image_3'] = $image_3_name;
        Property::create($data);
        return redirect('property')->with('success', 'تم أضافة الوحده بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::find($id);
        return view("dashboard.properties.show", compact('property'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $project = Project::get();
        $users = User::get();
        $property = Property::find($id);
      return view("dashboard.properties.edit", compact('property', 'project','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $data = $request->validate([
            'title'=> 'required|string| min:10| max:100',
            'address'=> 'required|string| min:20| max:300',
            'details'=> 'required|string|min:20| max:1500',
            'price'=> 'required|string| min:1| max:10',
            'floor'=> 'required|string| min:1| max:2',
            'hall'=> 'required|string| min:1| max:3',
            'space'=> 'required|string| min:1| max:3',
            'room'=> 'required|string| min:1| max:3',
            'Baths'=> 'required|string| min:1| max:3',
            'Kitchen'=> 'required|string| min:1| max:3',
            'type' => 'required|in:villa,Apartment',
            'status'=> 'required|in:sell,rent',
            'project_id'=> 'required|exists:projects,id',
            'user_id'=> 'required|exists:users,id',

        ]);
        $property->image_1 = $request->image_1;
        $property->image_2 = $request->image_2;
        $property->image_3 = $request->image_3;
        $old_image_1 = $property->image_1;
        $old_image_2 = $property->image_2;
        $old_image_3 =  $property->image_3;
        if($request->hasFile('image_1')){
            $new_image_1 = $request->file('image_1')->store('property');
            File::delete($old_image_1);
            $property->image_1 = $new_image_1;
        }

        if($request->hasFile('image_2')){
            $new_image_2 = $request->file('image_2')->store('property');
            File::delete($old_image_2);
            $property->image_2 = $new_image_2;
        }

        if($request->hasFile('image_3')){
            $new_image_3 = $request->file('image_3')->store('property');
            File::delete($old_image_3);
            $property->image_3 = $new_image_3;
            $property->save();
        }


        Property::where('id', $property->id)->update($data);
        return redirect('property')->with('success', 'تم تعديل بيانات الوحده بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Find the post by its ID
        $properties = Property::find($id);
         // Delete the post
        $properties->delete();

         // Return a response indicating success
        return back()->with('success', 'تم حذف الوحده بنجاح');
    }


    public function search(Request $request){
        $search = $request->search;
        $property = Property::where(function($query) use ($search){
            $query->where('title', 'like', "%$search%")->orwhere('type', 'like', "%$search%")->orwhere('status', 'like', "%$search%");
        })->orWhereHas('project', function($query) use ($search){
            $query->where('name', 'like', "%$search%");
        })->orWhereHas('user', function($query) use ($search){
            $query->where('name', 'like', "%$search%");
        })->paginate(5);
        return view('dashboard.properties.search', compact('search','property'));
    }

}
