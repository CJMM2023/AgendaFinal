<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this -> faker->firstName,
            'apellido' => $this -> faker->lastName,
            'correo_electronico' => $this->faker->unique()->email,
            'telefono' =>$this-> faker->phoneNumber,
        ];
    }
}
