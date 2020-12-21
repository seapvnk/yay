<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatarPath = md5(now()) . '.jpg';
        $image = file_get_contents("https://thispersondoesnotexist.com/image");
        file_put_contents(public_path('storage/avatar/'. $avatarPath), $image);

        return [
            'username' => $this->faker->username,
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'location' => $this->faker->city,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'avatar' => $avatarPath,
            'remember_token' => Str::random(10),
        ];
    }
}
