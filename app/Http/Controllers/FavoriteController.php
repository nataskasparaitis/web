<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    
    public function add(Request $request)
    {
        $userId = Auth::id();
        $carId = $request->carId;  // renamed from contentId

        $existing = Favorite::where('user_id', $userId)
                            ->where('car_id', $carId)
                            ->first();

        if($existing) {
            $existing->delete();
            \Log::info('User removed favorite car: ' . Auth::user()->email . " car ID: " . $carId);
            return response()->json(['status' => 'removed']);
        } else {
            \Log::info('User added favorite car: ' . Auth::user()->email . " car ID: " . $carId);
            Favorite::create([
                'user_id' => $userId,
                'car_id' => $carId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
    
    public function remove()
    {
        // unused
    }
    public function index()
    {
        //
    }
    public function favorites()
    {
        \Log::info('User viewed favorites page: ' . Auth::user()->email);
        $favorites = Favorite::where('user_id', Auth::id())
                            ->with('car')
                            ->get();

        return view('favorites', ['favorites' => $favorites]);
    }

    public function create() { }
    public function store(Request $request) { }
    public function show(Favorite $favorite) { }
    public function edit(Favorite $favorite) { }
    public function update(Request $request, Favorite $favorite) { }
    public function destroy(Favorite $favorite) { }
}