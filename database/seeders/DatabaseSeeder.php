<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        $notunUser = new User();
        $notunUser->name = 'Shamim';
        $notunUser->email = 'me@me.me';
        $notunUser->password = bcrypt('password');
        $notunUser->save();

        $notunUser = new User();
        $notunUser->name = 'Fayjullah';
        $notunUser->email = 'meee@me.me';
        $notunUser->password = bcrypt('password');
        $notunUser->save();
    }
}
