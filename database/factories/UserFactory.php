<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
//UserFactory digunakan untuk membuat data pengguna (User) secara otomatis.
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    //definition() → Menentukan nilai default untuk setiap kolom di model User saat data dibuat
    {
        return [
            'name' => fake()->name(),
            //fake() digunakan untuk menghasilkan data palsu
            'email' => fake()->unique()->safeEmail(),
            //unique(): Menjamin bahwa email yang dihasilkan akan unik (tidak ada duplikat).
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            //password menggunakan password default "password" yang di-hash
            'remember_token' => Str::random(10),
            //remember_token menghasilkan token acak.
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    //unverified() digunakan untuk menetapkan status email pengguna sebagai tidak terverifikasi dalam factory.
    {
        return $this->state(fn (array $attributes) => [
        //state(): Merupakan metode di Laravel Factory yang digunakan untuk mengubah status atau atribut tambahan pada model yang akan dibuat.
        //fn (array $attributes): Ini adalah fungsi callback yang menerima atribut model ($attributes) dan mengembalikan perubahan data.    
            'email_verified_at' => null,
            //'email_verified_at' => null: Mengatur kolom email_verified_at menjadi null, yang berarti email belum diverifikasi.
        ]);
    }
}
