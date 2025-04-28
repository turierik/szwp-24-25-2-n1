<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\HouseResource;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HouseResource::collection(House::with('owner') -> withCount('rooms') -> get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            "address" => "required|string|min:10",
            //"owner_id" => "required|integer|exists:users,id",
            "rent" => "required|decimal:0,2|min:0|max:99999",
            "size" => "required|integer|min:1|max:999",
            "image" => "nullable|file|image"
        ]);

        $validated['owner_id'] = $request -> user() -> id;

        $house = House::create($validated);
        return new HouseResource($house);
        //return response() -> json($house, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $house)
    {
        if(filter_var($house, FILTER_VALIDATE_INT) === false){
            return response()->json([ "message" => "Invalid House ID."], 400);
        }
        return House::findOrFail($house);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        if(filter_var($house, FILTER_VALIDATE_INT) === false){
            return response()->json([ "message" => "Invalid House ID."], 400);
        }
        $house = House::findOrFail($house);

        $validated = $request -> validate([
            "address" => "required|string|min:10",
            "owner_id" => "required|integer|exists:users,id",
            "rent" => "required|decimal:0,2|min:0|max:99999",
            "size" => "required|integer|min:1|max:999",
            "image" => "nullable|file|image"
        ]);

        $house -> update($validated);
        return response() -> json($house, 200);
    }

    public function login(Request $request){
        $validated = $request -> validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)){
            // vagy sikerül
            $user = User::where("email", $validated["email"]) -> first();
            $token = $user -> createToken('accessTokenName');
            return response() -> json(["token" => $token -> plainTextToken], 201);
        } else {
            // vagy nem :)
            return response() -> json(["message" => "Invalid credentials."], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        //
    }
}
