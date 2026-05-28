<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function home(Request $request)
    {
        \Log::info('User viewed homepage: ' . Auth::user()->email . " with username: " . Auth::user()->username);
        // Paginate cars, 12 per page
        $cars = Car::paginate(12);
        $userFavorites = Favorite::where('user_id', Auth::id())->pluck('car_id')->toArray();
        return view('home', ['cars' => $cars, 'userFavorites' => $userFavorites]);
    }

    // Removed movies() and series() methods

    public function adminRedirect()
    {
        \Log::info('admin redirected back to homepage: ' . Auth::user()->email . " with username: " . Auth::user()->username);
        return redirect('/home');
    }

    public function adminIndex()
    {
        $cars = Car::getAllCars();
        return view('admin', ['cars' => $cars]);
    }

    public function adminCreate()
    {
        \Log::info('CarController@adminCreate - Admin accessed create car page: ' . Auth::user()->email);
        return view('admin.create');
    }
    
    public function adminStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:cars',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|string',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'make' => 'required|string|max:50',
            'model' => 'required|string|max:50',
        ]);

        Car::addCar([
            'title' => $request->title,
            'price' => $request->price,
            'image_url' => $request->image_url,
            'year' => $request->year,
            'make' => $request->make,
            'model' => $request->model,
        ]);

        \Log::info('CarController@adminStore - Admin added car: ' . $request->title);
        return redirect('/admin');
    }

    public function adminEdit($id)
    {
        $car = Car::getCarById($id);
        \Log::info('CarController@adminEdit - admin editing car: ' . $car->title);
        return view('admin.edit', ['car' => $car]);
    }

    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|string',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'make' => 'required|string|max:50',
            'model' => 'required|string|max:50',
        ]);

        Car::updateCar($id, [
            'title' => $request->title,
            'price' => $request->price,
            'image_url' => $request->image_url,
            'year' => $request->year,
            'make' => $request->make,
            'model' => $request->model,
        ]);

        \Log::info('CarController@adminUpdate - Admin updated car: ' . $request->title);
        return redirect('/admin');
    }

    public function adminDestroy($id)
    {
        $car = Car::getCarById($id);
        \Log::info('CarController@adminDestroy - Admin deleted car: ' . $car->title);
        Car::deleteCar($id);
        return redirect('/admin');
    }
}