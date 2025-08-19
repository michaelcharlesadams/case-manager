<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $attorney = Role::firstOrCreate(['name' => 'attorney']);
        $staff = Role::firstOrCreate(['name' => 'staff']);

        $user = User::firstOrCreate(
            ['email' => 'admin@yourfirm.com'],
            ['name' => 'Firm Admin', 'password' => Hash::make('password')]
        );
        $user->assignRole($admin);
    }
}
