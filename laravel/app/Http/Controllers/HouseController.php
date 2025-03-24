<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateOrUpdateHouseRequest;

class HouseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrUpdateHouseRequest $request)
    {
        $validated = $request -> validated();
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
        return view('houses.edit', [
            "house" => $house,
            "users" => \App\Models\User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateOrUpdateHouseRequest $request, House $house)
    {
        $validated = $request -> validated();
        $house -> update($validated);
        Session::flash('house-updated');
        return redirect() -> route('houses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        $house -> delete();
        Session::flash('house-deleted');
        return redirect() -> route('houses.index');
    }
}
