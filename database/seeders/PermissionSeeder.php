<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => Str::slug('Admin Access'),
            'guard_name' => 'web'
        ]);
        
        Permission::create([
            'name' => Str::slug('Pegawai Access'),
            'guard_name' => 'web'
        ]);
    }
}
