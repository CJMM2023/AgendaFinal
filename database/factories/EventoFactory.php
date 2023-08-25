<?php

namespace Database\Factories;

use App\Models\Contacto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this -> faker->word,
            'descripcion' => $this -> faker->paragraph(),
            'fecha_inicio' => $this ->faker->dateTime(),
            'fecha_final' =>$this-> faker->dateTime(),
            'contacto_id'=>Contacto::get('id')->random(),
        ];
    }
}

