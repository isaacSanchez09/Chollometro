<?php

namespace Database\Factories;

use App\Models\Chollo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentari>
 */
class ComentariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $comentarios = ['Muy buen chollo','Recomendado','Pilladooo!! Gracias','No es chollo','En otra página es más barato','Ese es su precio original', 'Mala opción','Espero que este sea tu ultimo chollo','Gran aportación'];

    public function definition()
    {
        return [
            'Contingut' => $this->comentarios[rand(0,count($this->comentarios) -1)],
            'user_id' => User::inRandomOrder()->first(),
            'chollo_id' => Chollo::inRandomOrder()->first(),
        ];
    }
}
