<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars'; // specify table name
    protected $fillable = [
        'title',
        'price',
        'image_url',
        'year',
        'make',
        'model',
    ];

    public static function getAllCars()
    {
        return self::all();
    }

    public static function getCarById($id)
    {
        return self::find($id);
    }

    public static function addCar($data)
    {
        return self::create($data);
    }

    public static function updateCar($id, $data)
    {
        return self::find($id)->update($data);
    }

    public static function deleteCar($id)
    {
        return self::find($id)->delete();
    }
}