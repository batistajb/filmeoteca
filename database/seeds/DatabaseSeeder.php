<?php

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
        factory(App\Models\User::class, 15)->create();
        factory(App\Models\Movie::class, 30)->create();
        factory(App\Models\Address::class, 30)->create();
        factory(App\Models\Contact::class, 30)->create();
        $this->call(UsersTableSeeder::class);
    }
}
