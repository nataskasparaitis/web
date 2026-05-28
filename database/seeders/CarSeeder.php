<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['title' => '2022 Tesla Model 3', 'price' => 45990, 'year' => 2022, 'make' => 'Tesla', 'model' => 'Model 3', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2021 BMW M4', 'price' => 71800, 'year' => 2021, 'make' => 'BMW', 'model' => 'M4', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2023 Toyota Camry', 'price' => 26320, 'year' => 2023, 'make' => 'Toyota', 'model' => 'Camry', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2020 Audi Q7', 'price' => 54800, 'year' => 2020, 'make' => 'Audi', 'model' => 'Q7', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2022 Ford Mustang', 'price' => 27205, 'year' => 2022, 'make' => 'Ford', 'model' => 'Mustang', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2023 Honda Civic', 'price' => 23550, 'year' => 2023, 'make' => 'Honda', 'model' => 'Civic', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2021 Mercedes-Benz C-Class', 'price' => 44350, 'year' => 2021, 'make' => 'Mercedes-Benz', 'model' => 'C-Class', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2022 Porsche 911', 'price' => 101200, 'year' => 2022, 'make' => 'Porsche', 'model' => '911', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2023 Hyundai Elantra', 'price' => 20500, 'year' => 2023, 'make' => 'Hyundai', 'model' => 'Elantra', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2020 Chevrolet Silverado', 'price' => 38700, 'year' => 2020, 'make' => 'Chevrolet', 'model' => 'Silverado', 'image_url' => 'images/cars/chevrolet_silverado.jpg'],
            ['title' => '2021 Subaru Outback', 'price' => 28240, 'year' => 2021, 'make' => 'Subaru', 'model' => 'Outback', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2022 Volvo XC90', 'price' => 50000, 'year' => 2022, 'make' => 'Volvo', 'model' => 'XC90', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2023 Kia Telluride', 'price' => 35290, 'year' => 2023, 'make' => 'Kia', 'model' => 'Telluride', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2021 Mazda CX-5', 'price' => 26270, 'year' => 2021, 'make' => 'Mazda', 'model' => 'CX-5', 'image_url' => 'images/cars/placeholder.jpg'],
            ['title' => '2022 Jeep Wrangler', 'price' => 31800, 'year' => 2022, 'make' => 'Jeep', 'model' => 'Wrangler', 'image_url' => 'images/cars/placeholder.jpg'],
        ];

        foreach($cars as $car) {
            Car::create([
                'title' => $car['title'],
                'price' => $car['price'],
                'image_url' => $car['image_url'],
                'year' => $car['year'],
                'make' => $car['make'],
                'model' => $car['model'],
            ]);
        }
    }
}