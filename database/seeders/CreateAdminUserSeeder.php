<?php

namespace Database\Seeders;

use App\Models\AdminAccounts;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = AdminAccounts::create([
            'user_name' => 'Sasi',
            'email' => 'Sasi@gmail.com',
            'password' => 'admin',
            'role' => 'CEO'
        ]);


    }
}
// php artisan db:seed --class=CreateAdminUserSeeder
