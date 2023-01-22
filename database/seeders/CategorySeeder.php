<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [   ['name' => 'VideoConsolas'],['name' => 'Televisiones'],['name'=> 'Smartphones'], ['name' => 'Electrodomesticos'], ['name' => 'Ropa'],['name' => 'Relojes']];

        DB::table('categories')->insert($data);
    }
}
