<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(6);
        return view('front.property-grid', compact('properties'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $user = User::find($id);
        $property = Property::find($id);
        return view("front.property-single", compact('property', 'user'));
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


    public function search(Request $request)
{
    
    $search = $request->input('search');
    $properties = Property::where('title', 'like', "%$search%")
    ->orwhere('type', 'like', "%$search%")
    ->orwhere('status', 'like', "%$search%")
    ->get();


     return view('front.search', compact('search','properties'));
}


}








// public function search(Request $request){
//     $search = $request->search;
//     $properties = Property::where(function($query) use ($search){
//         $query->where('title', 'like', "%$search%")->orwhere('type', 'like', "%$search%")->orwhere('status', 'like', "%$search%")->get();
//     return view('front.search', compact('search','properties'));
//     });
// }

    // $properties = QueryBuilder::for(Property::class)
    // ->allowedFilters(['type', 'status'])->get();
    // $properties = Property::with('property:id,title')->where('status','approved')->get();