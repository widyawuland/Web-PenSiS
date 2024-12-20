<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_siswa' => $this->faker->name,
            'foto' => $this->faker->imageUrl(640, 480, 'people', true, 'siswa'),
            'kelas' => $this->faker->randomElement(['10A', '10B', '11A', '11B', '12A', '12B']),
        ];
    }
}
