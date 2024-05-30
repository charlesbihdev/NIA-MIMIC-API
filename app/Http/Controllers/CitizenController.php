<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Citizen::all();

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $randomNumber = rand(1, 75);
        return Citizen::create([
            'firstname' => 'Kwame',
            'lastname' => 'Nkrumah',
            'phone' => '055' . mt_rand(1000000, 9999999),
            'ghanaCardNumber' => 'GHA-' . strtoupper(Str::random(10)),
            'age' => mt_rand(18, 65),
            'location' => 'Accra',
            'GPS_Address' => strtoupper(Str::random(4)) . '-' . mt_rand(100, 999),
            'image' => "https://randomuser.me/api/portraits/med/men/$randomNumber.jpg"
        ]);
    }

    // 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Citizen::find($id);
    }

    public function searchByPhone($phone)
    {
        $citizen = Citizen::where('phone', $phone)->first();
        return response()->json($citizen);
    }

    public function searchByGhanaCard($ghanaCardNumber)
    {
        $citizen = Citizen::where('ghanaCardNumber', $ghanaCardNumber)->first();
        // dd($citizen);
        return response()->json($citizen);
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
}
