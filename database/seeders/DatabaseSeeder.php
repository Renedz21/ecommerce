<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/public/categories');
        Storage::makeDirectory('/public/categories');

        Storage::deleteDirectory('/public/subCategories');
        Storage::makeDirectory('/public/subCategories');

        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(SubcategorySeeder::class);

        $this->call(ProductSeeder::class);
    }
}
