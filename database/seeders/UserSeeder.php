<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);
        $admin->givePermissionTo('admin-access');
        $admin->assignRole('admin');

        $pegawai = User::create([
            'name' => 'pegawai',
            'email' => 'pegawai@pegawai.com',
            'password' => Hash::make('pegawai')
        ]);
        $pegawai->givePermissionTo('pegawai-access');
        $pegawai->assignRole('pegawai');

    }
}
