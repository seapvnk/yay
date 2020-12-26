<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // delete pictures
        $images = array_filter(scandir(public_path() . "/storage/avatar"), function ($image) {
            return !in_array($image, ['.', '..']);
        });
        
        foreach ($images as $image) {
            unlink(public_path() . "/storage/avatar/" . $image);
        }

        $usersQuantity = (int) $this->command->anticipate('How many users?', [5, 10, 15]);
        $statusPerUserQuantity = (int) $this->command->anticipate('How many statuses per user?', [5, 10, 15]);

        if (!is_int($usersQuantity) || !is_int($statusPerUserQuantity)) {
            $usersQuantity = 5;
            $statusPerUserQuantity = 5;
        }
        
        \App\Models\User::factory($usersQuantity)->has(
            \App\Models\Status::factory($statusPerUserQuantity)
        )->create();
    }
}
