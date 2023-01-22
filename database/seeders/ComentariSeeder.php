<?php

namespace Database\Seeders;

use App\Models\Chollo;
use App\Models\Comentari;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $chollos = Chollo::all();
        $chollos->each(function($chollo) {
            Comentari::factory()->count(6)->create([
                'chollo_id' => $chollo->id,
            ]);
        });
    }
}
