<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HouseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            "address" => "required|string|min:10",
            "owner_id" => "required|integer|exists:users,id",
            "rent" => "required|decimal:0,2|min:0|max:99999",
            "size" => "required|integer|min:1|max:999"
        ], [
            "address.required" => "A cím kitöltése kötelező.",
            "size.min" => "A méret legalább :min kell legyen."
        ]);
        House::create($validated);
        Session::flash('house-created');
        return redirect() -> route('houses.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('houses.index', [
            // "houses" => House::all()    N+1 probléma, ha kell az owner is! - lazy loading
            "houses" => House::with('owner') -> get()  // eager loading
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('houses.create', [
            "users" => \App\Models\User::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        return view('houses.show', [
            "house" => $house
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        //
    }
}
