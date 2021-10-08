<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'),
                'icon' => "<i class='bx bx-mobile-alt'></i>"
            ],
            [
                'name' => 'TV, audio y video',
                'slug' => Str::slug('TV, audio y video'),
                'icon' => "<i class='bx bx-tv' ></i>"
            ],
            [
                'name' => 'Consola y videojuegos',
                'slug' => Str::slug('Consola y videojuegos'),
                'icon' => "<i class='bx bx-joystick' ></i>"
            ],
            [
                'name' => 'Computacion',
                'slug' => Str::slug('Computacion'),
                'icon' => "<i class='bx bx-desktop' ></i>"
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => "<i class='bx bxs-t-shirt'></i>"
            ],
        ];

        foreach ($categories as $item) {
            Category::factory(1)->create($item);
        }
    }
}
