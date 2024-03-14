<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234567')
        ]);

        $admin->assignRole('admin');

        $customer = User::create([
            'name' => 'Quvonchbek',
            'email' => 'quvonchbek@gmail.com',
            'password' => Hash::make('customer234')
        ]);

        $customer->assignRole('customer');

        $manager = User::create([
            'name' => 'Sherali',
            'email' => 'sherali@gmail.com',
            'password' => Hash::make('manager123')
        ]);

        $manager->assignRole('manager');
    }
}
